%% GREEDY ALGORITH FIND THE BEST ENERGY-EFFECTIVE SCENARIO

%% Initialise input and call the function

find_the_cheapest();

%% The function
function find_the_cheapest()
        
    jsonText = fileread("json\scenarios.json");
    jsonData = jsondecode(jsonText); % Convert JSON formatted text to MATLAB data types
    
    j = length(jsonData);
    chepestTableS = zeros(j,1);
    chepestTableE = zeros(j,1);
    minimum_energy = jsonData(1).Energy ;
    chepest_scenario = 1;
    
    if j < 2
        disp("Error not enougth");
    else    
        for i = 1:1:j
            if jsonData(i).Energy < minimum_energy
                minimum_energy = jsonData(i).Energy;
                chepest_scenario = i;
                
            elseif jsonData(i).Energy == minimum_energy
                minimum_energy = jsonData(i).Energy;
                me = str2double(minimum_energy);
                chepest_scenario = i;
                chepestTableS(i) = i;
                chepestTableE(i) = me;
            end            
        end
    end
    disp("The cheepest scenario is:");
    disp(chepest_scenario);
    disp("With Energy:");
    disp(minimum_energy);

    json_file_generator(chepestTableS,chepestTableE,jsonData);

end %End of greedy


%% - Start creating json files!
function json_file_generator(chepestTableS,chepestTableE,jsonData)

    chepestTableS( ~any(chepestTableS,2), : ) = [];  %rows
    chepestTableE( ~any(chepestTableE,2), : ) = [];  %rows
    scenario = chepestTableS;
    energy = chepestTableE;
    f_table = table(scenario,energy);
    %f_table( :, ~any(f_table,1) ) = [];  %columns

    jsonText = jsonencode(f_table); % Convert to JSON text
    jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
    % jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
    % jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
    jsonText = strrep(jsonText, '}', sprintf('\r}'));
    jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
    
    fid = fopen('energy-effective.json', 'w'); % Write to a json file
    fprintf(fid, '%s', jsonText);
    fclose(fid);
    
    movefile('energy-effective.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')
    
    Table = struct2table(jsonData);
    energy = Table.Energy;
    scenario = Table.scenario;
    Final = table(scenario,energy);
    sortT = sortrows(Final,2);
    jsonText = jsonencode(sortT); % Convert to JSON text
    jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
    % jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
    % jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
    jsonText = strrep(jsonText, '}', sprintf('\r}'));
    jsonText = strrep(jsonText, '{', sprintf('{\r\t'));
    %sorted_Table = table();

    fid = fopen('sort_by_chipest_list_e.json', 'w'); % Write to a json file
    fprintf(fid, '%s', jsonText);
    fclose(fid);
    movefile('sort_by_chipest_list_e.json','E:\Development\Laravel\Thesis_Tool\public\MatlabCodes\Results')

end



