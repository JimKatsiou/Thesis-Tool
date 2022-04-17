clc;
clear;
close all;

%% Problem Definition -GA Parameters (here is defined the the parameters of the genetic algorithm)
scenarios = 3;
for sc=1:1:scenarios
    if (sc == 1)  % 5g scenario
        
        nVar = 3;               % Number of variables
        VarMin = [20, 20, 20];  % The lower bound of the chromosomes
        VarMax = [80, 80, 80];  % The upper bound of the chromosomes
        
        generation = 50;       % MaxIt - Maximum number of generation / maximum number of iterations.
        population_size = 50;   % Population size. Our initial population and the population size will be constant for any generation.
        
        population = zeros(population_size,nVar);         % Initializing the size of the population
        temp_population = zeros(population_size,nVar);    % Intializing the size of the temporary population
        mu = 0.1;               % Mutation Rate => 10% and that means, i am going to mutate and alter 10% of gene in average.
        
        S_population = zeros (population_size,nVar+2);   % Initializing the size of the sorted population using the problem objective function
        Cost = zeros(population_size,1);                 % initializing the size of the objective function based on the population size
        Energy = zeros(population_size,1);               % initializing the size of the objective function based on the population size
        crossover_times = 4;    % Number of crossovers
        mutation_times = 5;     % Number of mutations
    
    elseif( sc == 2) % LoRa scenario

        nVar = 4;               % Number of variables
        VarMin = [20, 20, 20, 10];            % The lower bound of the chromosomes
        VarMax = [80, 80, 80, 30];            % The upper bound of the chromosomes
        
        generation = 50;       % MaxIt - Maximum number of generation / maximum number of iterations.
        population_size = 50;    % Population size. Our initial population and the population size will be constant for any generation.
        
        population = zeros(population_size,nVar);         % Initializing the size of the population
        temp_population = zeros(population_size,nVar);    % Intializing the size of the temporary population
        mu = 0.1;               % Mutation Rate => 10% and that means, i am going to mutate and alter 10% of gene in average.
        
        S_population = zeros (population_size,nVar+1);   % Initializing the size of the sorted population using the problem objective function
        Cost = zeros(population_size,1);                    % initializing the size of the objective function based on the population size
        crossover_times = 4;    % Number of crossovers
        mutation_times = 5;     % Number of mutations

    elseif( sc == 3) % NB scenario

        nVar = 3; 
        VarMin = [20, 20, 20];            % The lower bound of the chromosomes
        VarMax = [80, 80, 80];    % Number of variables
        %VarMin = 20;            % The lower bound of the chromosomes
        %VarMax = 80;            % The upper bound of the chromosomes
        
        generation = 50;       % MaxIt - Maximum number of generation / maximum number of iterations.
        population_size = 50;    % Population size. Our initial population and the population size will be constant for any generation.
        
        population = zeros(population_size,nVar);         % Initializing the size of the population
        temp_population = zeros(population_size,nVar);    % Intializing the size of the temporary population
        mu = 0.1;               % Mutation Rate => 10% and that means, i am going to mutate and alter 10% of gene in average.
        
        S_population = zeros (population_size,nVar+1);   % Initializing the size of the sorted population using the problem objective function
        Cost = zeros(population_size,1);                    % initializing the size of the objective function based on the population size
        crossover_times = 4;    % Number of crossovers
        mutation_times = 5;     % Number of mutations

    end

    for i=1:1:population_size
        for n=1:1:nVar
            population(i,n)= unifrnd(VarMin(1,n),VarMax(1,n));
            %population(i,n)= unifrnd(VarMin(1),VarMax(1));
            population(i,n)= uint8(population(i,n));
        
        end
        if (sc == 1)
            [Cost(i), Energy(i)]= objectiveFunction5g(population(i,:));
        elseif (sc == 2)
            [Cost(i), Energy(i)]= objFunLoRa(population(i,:));
        elseif (sc == 3)
            [Cost(i), Energy(i)]= objFunNB(population(i,:));
        end
        
    end

    % Sorting of the population
    S_population(:,1:nVar)= population(:,:);
    S_population(:,nVar+1)=Cost;
    S_population(:,nVar+2)=Energy;
    S_population= sortrows(S_population,nVar+1);
    S_population_energy= sortrows(S_population,nVar+2);

    % Generation
for ii=1:1:generation
    k=1;        % This is used to initialize the location of the temp_population;

    % Elitism
    temp_population(k,1:nVar) = S_population(1,1:nVar);
    k= k + 1;

    % Selection and Crossover
    for j=1:1:crossover_times
        % Parents selection
        y1(j) = geornd(0.1)+1;
        while y1(j) > population_size
            y1(j) = geornd(0.1)+1 ;
        end
        y2(j) = geornd(0.1)+1;
        while y2(j)> population_size
            y2(j) = geornd(0.1)+1;
        end
    end

    for u=1:1:crossover_times
        parent1= S_population(y1(u),1:nVar);
        parent2= S_population(y2(u),1:nVar);

        % Arithmetic Crossover
        [Children] = arithmetic_crossover(parent1, parent2);
        temp_population(k,1:nVar) = Children(1,:);
        
        temp_population(k,1:nVar) = max(temp_population(k,1:nVar),VarMin);
        temp_population(k,1:nVar) = min(temp_population(k,1:nVar),VarMax);
        
        k=k+1;
        temp_population(k,1:nVar) = Children(2,:);
        
        temp_population(k,1:nVar)=max(temp_population(k,1:nVar),VarMin);
        temp_population(k,1:nVar)=min(temp_population(k,1:nVar),VarMax);
        
        k=k+1;
    end

    % Mutation
    for e=1:1:mutation_times
        parent=S_population(unidrnd(population_size),1:nVar);
        [child]= gene_mutation (parent,mu,VarMax);
        
        temp_population(k,1:nVar)=child;
        temp_population(k,1:nVar)=max(temp_population(k,1:nVar),VarMin);
        temp_population(k,1:nVar)=min(temp_population(k,1:nVar),VarMax);
    
        k=k+1;
    end

    %Replication
    for k=k:1:population_size
        replicated_child = S_population(randi([1 population_size]),1:nVar);
        temp_population(k,1:nVar) = replicated_child;
        k=k+1;
    end

    % Calculating the temporary population objective function values
    for iii=1:1:population_size
        %[Cost(iii), Energy(iii)]= objectiveFunction(temp_population(iii,:));
        if (sc == 1)
            [Cost(iii), Energy(iii)] = objectiveFunction5g(temp_population(iii,:));
        elseif (sc == 2)
            [Cost(iii), Energy(iii)] = objFunLoRa(temp_population(iii,:));
        elseif (sc == 3)
            [Cost(iii), Energy(iii)] = objFunNB(temp_population(iii,:));
        end
    end

    % sorting for the next generation and selection of the population best  
    S_population(:,1:nVar) = temp_population;
    S_population(:,nVar+1) = Cost(:,:);
    S_population(:,nVar+2) = Energy(:,:);
    S_population = sortrows(S_population,nVar+1);
    S_population_energy = sortrows(S_population,nVar+2);
     
    Best_F(ii) = S_population(1,nVar+1);

    disp(['Iteration ' num2str(ii) ': Best Cost = ' num2str(Best_F(ii))]);
end

%% Generate Json files
    if (sc == 1)  % 5g scenario
        % cost-effective (cheapest) 5g solution (sort-by-solution)
        %s  = table2struct(S_population);
	    jsonText = jsonencode(S_population); % Convert to JSON text
        jsonText = strrep(jsonText, '[[', sprintf('[\r\t{\r\t\t'));
        jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
        jsonText = strrep(jsonText, '],', sprintf('\r\t},'));
	    jsonText = strrep(jsonText, '[', sprintf('{\r\t\t'));
	    
	    fid = fopen('GA-cost-effective-5g-solutions.json', 'w'); % Write to a json file
	    fprintf(fid, '%s', jsonText);
	    fclose(fid);
	    
	    movefile('GA-cost-effective-5g-solutions.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results\GA')
    elseif (sc == 2)
        % cost-effective (cheapest) 5g solution (sort-by-solution)
        %s  = table2struct(S_population);
	    jsonText = jsonencode(S_population); % Convert to JSON text
        jsonText = strrep(jsonText, '[[', sprintf('[\r\t{\r\t\t'));
        jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
        jsonText = strrep(jsonText, '],', sprintf('\r\t},'));
	    jsonText = strrep(jsonText, '[', sprintf('{\r\t\t'));
	    
	    fid = fopen('GA-cost-effective-lora-solutions.json', 'w'); % Write to a json file
	    fprintf(fid, '%s', jsonText);
	    fclose(fid);
	    
	    movefile('GA-cost-effective-lora-solutions.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results\GA')
    elseif (sc == 3)
        % cost-effective (cheapest) 5g solution (sort-by-solution)
        %s  = table2struct(S_population);
	    jsonText = jsonencode(S_population); % Convert to JSON text
        jsonText = strrep(jsonText, '[[', sprintf('[\r\t{\r\t\t'));
        jsonText = strrep(jsonText, ',', sprintf(',\r\t\t'));
        jsonText = strrep(jsonText, '],', sprintf('\r\t},'));
	    jsonText = strrep(jsonText, '[', sprintf('{\r\t\t'));
	    
	    fid = fopen('GA-cost-effective-NB-solutions.json', 'w'); % Write to a json file
	    fprintf(fid, '%s', jsonText);
	    fclose(fid);
	    
	    movefile('GA-cost-effective-NB-solutions.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results\GA')
    end

end