/* standar library */
#include <stdio.h>

int main()
{
    int the_choice, i;
    int cheepst_scenario = 1;

    //Initialize array
    double cost_list[] = {1000, 300, 501, 700, 330};

    //Calculate length of array cost_list
    int length = sizeof(cost_list)/sizeof(cost_list[0]);

    //Initialize min with first element of array.
    double minimum_cost = cost_list[0];

    for (i = 1; i < length; i++){

        if(cost_list[i] < minimum_cost)
        {
            minimum_cost = cost_list[i];
            cheepst_scenario = i+1;
        }
        else if (cost_list[i] == minimum_cost)
        {
            minimum_cost = cost_list[i];
            cheepst_scenario = i+1;
        }
    }

    printf("the cheapest scenario is: %d\n The cost is: %f", cheepst_scenario,minimum_cost);

    return 0;
}



