%% GREEDY ALGORITH FIND THE BEST COST-EFFECTIVE SCENARIO

%% Initialise input and call the function

find_the_cheapest();

%% The function
function find_the_cheapest()
        
    jsonText = fileread("json\scenarios.json");
    jsonData = jsondecode(jsonText); % Convert JSON formatted text to MATLAB data types
    
    j = length(jsonData);
    chepestTableS = zeros(j,1);
    chepestTableC = zeros(j,1);
    minimum_cost = jsonData(1).FinalCost;
    chepest_scenario = 1;
    
    if j < 2
        disp("Error not enougth");
    else    
        for i = 1:1:j
            if jsonData(i).FinalCost < minimum_cost
                minimum_cost = jsonData(i).FinalCost;
                chepest_scenario = i;
                
            elseif jsonData(i).FinalCost == minimum_cost
                minimum_cost = jsonData(i).FinalCost;
                mc = str2double(minimum_cost);
                chepest_scenario = i;
                chepestTableS(i) = i;
                chepestTableC(i) = mc;
            end            
        end
    end
    disp("The cheepest scenario is:");
    disp(chepest_scenario);
    disp("Cost:");
    disp(minimum_cost);

    json_file_generator(chepestTableS,chepestTableC,jsonData);

end %End of greedy


%% - Start creating json files!
function json_file_generator(chepestTableS,chepestTableC,jsonData)

    chepestTableS( ~any(chepestTableS,2), : ) = [];  %rows
    chepestTableC( ~any(chepestTableC,2), : ) = [];  %rows
    scenario = chepestTableS;
    final_Cost = chepestTableC;
    f_table = table(scenario,final_Cost);
    %f_table( :, ~any(f_table,1) ) = [];  %columns

    jsonText = jsonencode(f_table); % Convert to JSON text
    jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
    % jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
    % jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
    jsonText = strrep(jsonText, '}', sprintf('\r}'));
    jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
    
    fid = fopen('cost-effective.json', 'w'); % Write to a json file
    fprintf(fid, '%s', jsonText);
    fclose(fid);
    
    movefile('cost-effective.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
    
    Table = struct2table(jsonData);
    final_cost = Table.FinalCost;
    scenario = Table.scenario;
    Final = table(scenario,final_cost);
    sortT = sortrows(Final,2);
    jsonText = jsonencode(sortT); % Convert to JSON text
    jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
    % jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
    % jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
    jsonText = strrep(jsonText, '}', sprintf('\r}'));
    jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
    %sorted_Table = table();

    fid = fopen('sort_by_chipest_list.json', 'w'); % Write to a json file
    fprintf(fid, '%s', jsonText);
    fclose(fid);
    movefile('sort_by_chipest_list.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')

end



