disp('Start')
run ('config.m')

count = 3;  %For the  diferent technologies (5G, LoRa,NB-IoT)
Id = 0;
Technology = "-";
NumberOfSensors = zeros(count,1);
CostOfSensors = zeros(count,1);
CostOfInsstalation = zeros(count,1);
FinalCost = zeros(count,1); % Adiprospeuei to sunolko cost gia to kathe network
Energy = zeros(count,1);

if (typeOfSystem == 1) % water quality
    disp('Water quality scenario')

    for i=1:1:num_scenarios
        if i == 1 % scenario 1: All techhnologies have the same number

        for j=1:1:count
            Id(j) = j;
            if j==1
                FinalCost_5g = (CostOfSensors5g * num_sensors) + CostOfInsstalation5g;
                Energy_5g = 4;

                Technology(j) = "5G";
                NumberOfSensors(j) = num_sensors;
                CostOfSensors(j) = CostOfSensors5g;
                CostOfInsstalation(j) = CostOfInsstalation5g;
                FinalCost(j) = FinalCost_5g;
                Energy(j) = Energy_5g;
            end
            if j==2
                FinalCost_lora = (CostOfSensorslora * num_sensors) + CostOfInsstalatiolora;
                Energy_lora = 4;

                Technology(j) = "LoRa";
                NumberOfSensors(j) = num_sensors;
                CostOfSensors(j) = CostOfSensorslora;
                CostOfInsstalation(j) = CostOfInsstalatiolora;
                FinalCost(j) = FinalCost_lora;
                Energy(j) = Energy_lora;
            end
            if j==3
                FinalCost_nb = (CostOfSensorsnb * num_sensors) + CostOfInsstalationnb;
                Energy_nb = 4;

                Technology(j) = "NB-IoT";
                NumberOfSensors(j) = num_sensors;
                CostOfSensors(j) = CostOfSensorsnb;
                CostOfInsstalation(j) = CostOfInsstalationnb;
                FinalCost(j) = FinalCost_nb;
                Energy(j) = Energy_nb;
            end

        end
        end
    end


elseif (typeOfSystem == 2) % water leak
    disp('Water leak scenario')
elseif (typeOfSystem == 3) % water temperature
    disp('Water temperature scenario')
elseif (typeOfSystem == 4) % soil moisture
    disp('Soil moisture scenario')

end
%% (INPUT) Take Sensor's parameters (from file or dynamic from somewhere or static)
    % number_of_sencors = ? ;
    % Κάθε είδος σένσορα έχει και δικά του χαρακτηριστικά

%% Sensor's Data Processing

% if (ανάλογα με το πρόβλημα που θέλουμε να καλύψουμε - Θέση, Κάλυψη κλπ)

    % if (ανάλογα με το σενάριο - κάθε σενάριο έχει κάποια χαρακτιριστικά)
        % if(scen == 1){
            %load(scen1_file)
        %}else { ....
    % if (ανάλογα με το application - τι απετήσεις έχει)

% Ορισμός κριτηρίων βελτιστότητας του αλγορίθμου (π.χ. energy optimization, water, air και gas)

% Cost efficiency

%% Find the best location for the devices

% --> Ένα πίνακας με "βαθμολογίες" (sorted table and choose the best)

%% Create and save the json file,(OUTPUT) Export data (json, API) Upload data to custom tool (simple interface)

jsonText = fileread('output_template.json');

jsonData = jsondecode(jsonText); % Convert JSON formatted text to MATLAB data types

%%inisialize json objects and usefull variables
% mesure-senario id

% NumberOfSensors = zeros(count,1);
% CostOfSensors = zeros(count,1);
% CostOfInsstalation = zeros(count,1);
% FinalCost = zeros(count,1);
% Energy = zeros(count,1);

% NumberOfSensorss = 2;
% CostOfSensorss = 5;
% CostOfInsstalationn = 4;
% FinalCostt = 100;
% Energyy = 4;

%%create the final
% for j=1:1:count
%     %Id(i) = jsonData.id;
%     %Id(j) = j;
%
%     NumberOfSensors(j) = NumberOfSensorss;
%     CostOfSensors(j) = CostOfSensorss;
%     CostOfInsstalation(j) = CostOfInsstalationn;
%     FinalCost(j) = FinalCostt;
%     Energy(j) = Energyy;
% end

Id = Id';
% Id_table = table(Id);
% Id = table2struct(Id_table);

% NumberOfSensors = NumberOfSensors';
% CostOfSensors = CostOfSensors';
% CostOfInsstalation = CostOfInsstalation';
% FinalCost = FinalCost';
% Energy = Energy';
Technology = Technology';

% results_Table = table(Id,NumberOfSensors,CostOfSensors,CostOfInsstalation,FinalCost,Energy);
% results = table2struct(results_Table);

Final = table(Id,Technology,NumberOfSensors,CostOfSensors,CostOfInsstalation,FinalCost,Energy);
% results = table2struct(results_Table);

%Final = table(Id,resuls);
%Final = table(results);
json = table2struct(Final);


% jsonData.NumberOfSensors = NumberOfSensors; % Change Fle_deliverd
% jsonData.CostOfSensors = CostOfSensors; % Change Fle_deliverd
% jsonData.CostOfInsstalation = CostOfInsstalation; % Change Fle_deliverd
% jsonData.FinalCost = FinalCost; % Change Fle_deliverd
% jsonData.Energy = Energy; % Change Fle_deliverd

%json = table2struct(Table);
% jsonText = jsonencode(json);% Convert to JSON text
% jsonText3 = jsonencode(jsonData1);% Convert to JSON text

%%Create and save json file

jsonText = jsonencode(json);% Convert to JSON text
jsonText = strrep(jsonText, ',', sprintf(',\r\t'));
% jsonText = strrep(jsonText, '[{', sprintf('[\r\t{\r'));
% jsonText = strrep(jsonText, '}]', sprintf('\r}\r]'));
jsonText = strrep(jsonText, '}', sprintf('\r}'));
jsonText = strrep(jsonText, '{', sprintf('{\r\t'));

fid = fopen('file.json', 'w'); % Write to a json file
fprintf(fid, '%s', jsonText);
fclose(fid);

movefile('file.json','D:\xampp\htdocs\Thises-Files')

    %save('response.mat','current_response');

% str00 = fileread('file.json'); % filename in JSON extension
% jsonDataX = jsondecode(str00);
% jsonTextX =s jsonencode(jsonDataX);% Convert to JSON text

%     fid = fopen('Flexxxx.json', 'w'); % Write to a json file
%     fprintf(fid, '%s', jsonTextX);
%     fclose(fid);

% %(PUT) UPLOAD DATA (json file) in server
% url = 'http://localhost:3000/.....';
%
% options = weboptions('MediaType','application/json','RequestMethod','put');
%
% data = jsonTextX;
% response = webwrite(url,data,options);

%% END

%% TOOL (Ανάλογα τι θέλω θα προσαρμοσεί)
     % --> ένα dashboar θα είναι στην ουσία ή menu με καρτέλες με πίνακες και αποτελέσματα
