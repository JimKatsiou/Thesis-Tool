clc;
clear;
close all;

%% Problem Definition -GA Parameters (here is defined the the parameters of the genetic algorithm)

nVar = 4;               % Number of variables
VarMin = [20, 20, 20, 10];            % The lower bound of the chromosomes
VarMax = [70, 70, 70, 30];            % The upper bound of the chromosomes

generation = 100;       % MaxIt - Maximum number of generation / maximum number of iterations.
population_size = 50;    % Population size. Our initial population and the population size will be constant for any generation.

population = zeros(population_size,nVar);         % Initializing the size of the population
temp_population = zeros(population_size,nVar);    % Intializing the size of the temporary population
mu = 0.1;               % Mutation Rate => 10% and that means, i am going to mutate and alter 10% of gene in average.

S_population = zeros (population_size,nVar+1);   % Initializing the size of the sorted population using the problem objective function
Cost = zeros(population_size,1);                    % initializing the size of the objective function based on the population size
crossover_times = 4;    % Number of crossovers
mutation_times = 5;     % Number of mutations

for i=1:1:population_size
     for n=1:1:nVar
        population(i,n)= unifrnd(VarMin(1,n),VarMax(1,n));
        %population(i,n)= unifrnd(VarMin(1),VarMax(1));
        population(i,n)= uint8(population(i,n));
        
     end
    
    Cost(i)= objectiveFunction(population(i,:));
end

% Sorting of the population
S_population(:,1:nVar)= population(:,:);
S_population(:,nVar+1)=Cost;
S_population= sortrows(S_population,nVar+1);

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
            y1(j) = geornd(0.1)+1;
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
        Cost(iii)= objectiveFunction(temp_population(iii,:));
    end

    % sorting for the next generation and selection of the population best  
    S_population(:,1:nVar) = temp_population;
    S_population(:,nVar+1) = Cost(:,:);
    S_population = sortrows(S_population,nVar+1);
     
    Best_F(ii) = S_population(1,nVar+1);

    disp(['Iteration ' num2str(ii) ': Best Cost = ' num2str(Best_F(ii))]);
end
%% Plots
plot(Best_F,'b');
pause(0.1)
xlabel('Generation')
ylabel('Best Value')
grid on
Xmin = S_population(1,1:nVar);
Fval = Best_F(1,generation);


% beta = 1;        % Selection pressure
% pC = 1;          % Proportion of Crossover => percentage of crossover or percentage of children. How many of the offspring will be created at each generation 
% gamma = 0.1;
% sigma = 0.1;
% 
% %% Resaults
% 
% figure;
% %plot(out.bestcost, 'LineWidth', 2);
% semilogy(out.bestcost, 'LineWidth', 2);
% xlabel('Interations');
% ylabel('Best Cost');
% grid on;














