%% Instructions
% This script is used to define all setup parameters in order to run the Main script 

%% General Parameters

typeOfSystem = 1;  % Acceptable values 1: Water Quality, 2:Water leakage, 3:Water Temperature 4: Soil moisture 
num_scenarios =1;  % **
num_sensors = 5;

%% Different Technology Parmeters (NB-IoT)

num_sensorsnb = 2; % *
CostOfSensorsnb = 100;
CostOfInsstalationnb = 100;


%% Different Technology Parmeters (5G)

num_sensors5g = 2; % *
CostOfSensors5g = 100;
CostOfInsstalation5g = 300;


%% Different Technology Parmeters (LoRa)

num_sensorslora = 5; % *
num_gateway = 3;
CostOfSensorslora = 100;
CostOfInsstalatiolora = 1000;
