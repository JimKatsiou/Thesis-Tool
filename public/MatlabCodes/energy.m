% GREEDY ALGORITH FIND THE BEST ENERGY-EFFECTIVE SCENARIO

    % get data from 5g_solutions json file 
    jsonText_5g_solutions = fileread("Inputs-json\5g_scenario.json");
    jsonData_5g_solutions = jsondecode(jsonText_5g_solutions); % Convert JSON formatted text to MATLAB data types
    Table_5g_solutions = table(jsonData_5g_solutions);

    % get data from nb_solutions json file 
    jsonText_nb_solutions = fileread("Inputs-json\nb_scenario.json");
    jsonData_nb_solutions = jsondecode(jsonText_nb_solutions); % Convert JSON formatted text to MATLAB data types
    Table_nb_solutions = table(jsonData_nb_solutions);

    % get data from lora_solutions json file 
    jsonText_lora_solutions = fileread("Inputs-json\lora_scenario.json");
    jsonData_lora_solutions = jsondecode(jsonText_lora_solutions); % Convert JSON formatted text to MATLAB data types
    Table_lora_solutions = table(jsonData_lora_solutions);

    % get cost data from json file 
    jsonText_Battery = fileread("Inputs-json\battery.json");
    jsonData_Battery = jsondecode(jsonText_Battery); % Convert JSON formatted text to MATLAB data types
    jsonDataBatteryTable = table(jsonData_Battery);
    
% ΠΡΟΣΠΕΛΑΣΗ ΠΙΝΑΚΑ SOLUTIONS 5G ΚΑΙ ΑΝΤΙΣΟΙΧΗΣΗ ΜΕ ΤA ENERGY
    for j=1:1:20
        
        capacity_5g_solution(j) = str2double();
		consumption_5g_solution(j) = str2double();
		
		battery_life_5g_solution(j) = capacity_5g_solution(j) / consumption_5g_solution(j);
		
		kostos_battarias
			
        solution_5g_FinalBatteryLife(j) = ;
        
    end
    
% ΠΡΟΣΠΕΛΑΣΗ ΠΙΝΑΚΑ SOLUTIONS LORA ΚΑΙ ΑΝΤΙΣΟΙΧΗΣΗ ΜΕ ΤΑ COST ΚΑΙ ENERGY
    for j=1:1:20

        cost_a = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_a);
        installattion_Cost_a = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_a);  
        costA = (cost_a + installattion_Cost_a);

        cost_b = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_b);
        installattion_Cost_b = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_b);  
        costB = (cost_b + installattion_Cost_b);

        cost_c = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_c);
        installattion_Cost_c = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_c);  
        costC = (cost_c + installattion_Cost_c);

        cost_g = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraGatewayTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_lora_gateway_type_a); 
        installattion_Cost_g = str2double(Table_lora_solutions.jsonData_lora_solutions(j,1).numberOfLoraGatewayTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_lora_gateway_type_a);  
        costG = (cost_g + installattion_Cost_g);

        solution_lora_FinalCost(j) = costA + costB + costC + costG;
    end
   
% ΠΡΟΣΠΕΛΑΣΗ ΠΙΝΑΚΑ SOLUTIONS NB-IoT ΚΑΙ ΑΝΤΙΣΟΙΧΗΣΗ ΜΕ ΤΑ COST ΚΑΙ ENERGY
    for j=1:1:20

        cost_a = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_a);
        installattion_Cost_a = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeA) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_a);  
        costA = (cost_a + installattion_Cost_a);

        cost_b = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_b);
        installattion_Cost_b = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeB) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_b);  
        costB = (cost_b + installattion_Cost_b);

        cost_c = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.cost_nb_type_c);
        installattion_Cost_c = str2double(Table_nb_solutions.jsonData_nb_solutions(j,1).numberOfNBSensorsTypeC) * str2double(jsonDataCostTable.jsonData_Cost.installation_cost_nb_type_c);  
        costC = (cost_c + installattion_Cost_c);

        solution_nb_FinalCost(j) = costA + costB + costC;
    end
   
    find_the_cheapest(solution_5g_FinalCost, solution_lora_FinalCost, solution_nb_FinalCost);

    

%% The function - ΕΥΡΕΣΗ ΚΑΛΥΤΕΡΩΝ ΛΎΣΕΩΝ ΑΝΑ ΣΕΝΑΡΙΟ
% Start of Greedy Algorith
function find_the_cheapest(solution_5g_Final?, solution_lora_Final?, solution_nb_Final?)

    minimum_?_5g = solution_5g_Final?(1);
    minimum_?_lora = solution_lora_Final?(1);
    minimum_?_nb = solution_nb_Final?(1);
    c1 = 0;
    c2 = 0;
    c3 = 0;
    for l=1:1:20
        if solution_5g_FinalCost(l) < minimum_cost_5g
            c1 = c1 + 1;
            minimum_cost_5g = solution_5g_FinalCost(l);
            cheapest_5g_solution = l;
            cheapest_5g_solutionTable(c1) = cheapest_5g_solution;
            cheapest_5g_solutionTableCost(c1) = minimum_cost_5g;

        elseif solution_5g_FinalCost(l) == minimum_cost_5g
            c1 = c1 + 1;
            minimum_cost_5g = solution_5g_FinalCost(l);
            cheapest_5g_solution = l;
            cheapest_5g_solutionTable(c1) = cheapest_5g_solution;
            cheapest_5g_solutionTableCost(c1) = minimum_cost_5g;
        end
        
        if solution_lora_FinalCost(l) < minimum_cost_lora
            c2 = c2 + 1;
            minimum_cost_lora = solution_lora_FinalCost(l);
            cheapest_lora_solution = l;
            cheapest_lora_solutionTable(c2) = cheapest_lora_solution;
            cheapest_lora_solutionTableCost(c2) = minimum_cost_lora;

        elseif solution_lora_FinalCost(l) == minimum_cost_lora
            c2 = c2 + 1;
            minimum_cost_lora = solution_lora_FinalCost(l);
            cheapest_lora_solution = l;
            cheapest_lora_solutionTable(c2) = cheapest_lora_solution;
            cheapest_lora_solutionTableCost(c2) = minimum_cost_lora;
        end

        if solution_nb_FinalCost(l) < minimum_cost_nb
            c3 = c3 + 1;
            minimum_cost_nb = solution_nb_FinalCost(l);
            cheapest_nb_solution = l;
            cheapest_nb_solutionTable(c3) = cheapest_nb_solution;
            cheapest_nb_solutionTableCost(c3) = minimum_cost_nb;

        elseif solution_nb_FinalCost(l) == minimum_cost_nb
            c3 = c3 + 1;
            minimum_cost_nb = solution_nb_FinalCost(l);
            cheapest_nb_solution = l;
            cheapest_nb_solutionTable(c3) = cheapest_nb_solution;
            cheapest_nb_solutionTableCost(c3 ) = minimum_cost_nb;

        end
    end 

    json_file_generator_greedy(cheapest_5g_solutionTable,cheapest_5g_solutionTableCost, ...
        cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable, ...
        cheapest_nb_solutionTableCost);

    %json_file_generator_more();

end         
    



%% - Start creating json files!
function json_file_generator_greedy(cheapest_5g_solutionTable,cheapest_5g_solutionTableCost, cheapest_lora_solutionTable,cheapest_lora_solutionTableCost,cheapest_nb_solutionTable,cheapest_nb_solutionTableCost)

    cheapest_5g_solutionTable;
    cheapest_5g_solutionTableCost;
    cheapest_lora_solutionTable;
    cheapest_lora_solutionTableCost;
    cheapest_nb_solutionTable;
    cheapest_nb_solutionTableCost;

	% cost-effective (cheapest) 5g solution (sort-by-cost)
	jsonText = jsonencode(cheapest_5g_solutionTableCost); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-5g-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-5g-solutions_by_cost.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
	
	% cost-effective (cheapest) 5g solution (sort-by-solution)
	jsonText = jsonencode(cheapest_5g_solutionTable); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-5g-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-5g-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
	
	
	% cost-effective (cheapest) LoRa solution (sort-by-cost)
	jsonText = jsonencode(cheapest_lora_solutionTableCost); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-lora-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-lora-solutions_by_cost.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')	
	
	
	% cost-effective (cheapest) LoRa solution (sort-by-solution)	
	jsonText = jsonencode(cheapest_lora_solutionTable); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-lora-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-lora-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')	
	
	
	% cost-effective (cheapest) NB-IoT solution (sort-by-cost)
	jsonText = jsonencode(cheapest_nb_solutionTableCost); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-nb-solutions_by_cost.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-nb-solutions_by_cost.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
	
	
	% cost-effective (cheapest) NB-IoT solution (sort-by-solution)
	jsonText = jsonencode(cheapest_nb_solutionTable); % Convert to JSON text
	jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
	% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
	% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
	jsonText = strrep(jsonText, '}', sprintf('\r}'));
	jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
  	
	fid = fopen('cost-effective-nb-solutions_by_solution.json', 'w'); % Write to a json file
	fprintf(fid, '%s', jsonText);
	fclose(fid);
	
	movefile('cost-effective-nb-solutions_by_solution.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')		

end


