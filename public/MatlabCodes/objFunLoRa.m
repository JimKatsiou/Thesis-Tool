function [Cost, Energy] = objFunLoRa(x)

    
% get cost data from json file 
    jsonText_Cost = fileread("Inputs-json\cost.json");
    jsonData_Cost = jsondecode(jsonText_Cost); % Convert JSON formatted text to MATLAB data types
    jsonDataCostTable = table(jsonData_Cost);

    jsonText_Energy = fileread("Inputs-json\battery.json");
    jsonData_Energy = jsondecode(jsonText_Energy); % Convert JSON formatted text to MATLAB data types
    jsonDataEnergyTable = table(jsonData_Energy);

    x1 = x(1);
    x2 = x(2);
    x3 = x(3);
    x4 = x(4);

    c1 = str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_a);
    c2 = str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_a);
    c3 = str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_b);
    c4 = str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_b);
    c5 = str2double(jsonDataCostTable.jsonData_Cost.cost_lora_type_c);
    c6 = str2double(jsonDataCostTable.jsonData_Cost.installation_cost_lora_type_c);
    c7 = str2double(jsonDataCostTable.jsonData_Cost.cost_lora_gateway_type_a);
    c8 = str2double(jsonDataCostTable.jsonData_Cost.installation_lora_gateway_type_a);

    capacity1 = str2double(jsonDataEnergyTable.jsonData_Energy.battery_capacity_lora_type_a);
    consumption1 = str2double(jsonDataEnergyTable.jsonData_Energy.consumption_lora_type_a);
    capacity2 = str2double(jsonDataEnergyTable.jsonData_Energy.battery_capacity_lora_type_b);
    consumption2 = str2double(jsonDataEnergyTable.jsonData_Energy.consumption_lora_type_b);
    capacity3 = str2double(jsonDataEnergyTable.jsonData_Energy.battery_capacity_lora_type_c);
    consumption3 = str2double(jsonDataEnergyTable.jsonData_Energy.consumption_lora_type_c);
    capacity4 = str2double(jsonDataEnergyTable.jsonData_Energy.battery_capacity_lora_gateway_type_a);
    consumption4 = str2double(jsonDataEnergyTable.jsonData_Energy.consumption_lora_gateway_type_a);


    cost1 = ( x1 * c1 ) + ( x1 * c2 );
    cost2 = ( x2 * c3 ) + ( x2 * c4 );
    cost3 = ( x3 * c5 ) + ( x3 * c6 );
    cost4 = ( x4 * c7 ) + ( x4 * c8 );

    batteryLife_1 = capacity1/consumption1;
    batteryLife_2 = capacity2/consumption2;
    batteryLife_3 = capacity3/consumption3;
    batteryLife_4 = capacity4/consumption4;

    Cost = cost1 + cost2 + cost3 + cost4;
    Energy =  (batteryLife_1 + batteryLife_2 + batteryLife_3 + batteryLife_4) / 4;

end