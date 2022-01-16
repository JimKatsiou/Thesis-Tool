%% Create App with Timer Object that Queries Website Data
% This app shows how to create a timer object in App Designer that executes a 
% function at regular time intervals. In this case, the app queries the wind 
% speed from a web site every five seconds and plots the returned value.
%
% This example also demonstrates the following app building tasks:
%
% * Writing a callback for an object created programmatically (in this case, the timer object)
% * Configuring a timer object to execute its callback at regular intervals
% * Starting the timer when the user clicks the *Start* button
% * Stopping the timer when the user clicks the *Stop* button
% * Deleting the timer when the app closes
%
% <<../windspeed_app_screenshot.png>>

% Copyright 2018 The MathWorks, Inc.