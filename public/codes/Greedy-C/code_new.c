#include <stdio.h>
//#include <json.h>
//#include <json/json.h>
//#include <jsoncpp/json/json.h>
#include<json-c/json.h>



int main(int argc, char **argv) {

    FILE *fp; // file pointer, to open thw json file
    char buffer[1024]; // to store the content

    struct json_object *parsed_json; // a json object structure to store the parse json, this struct hold the entaier json document
    struct json_object *finalCost; // for fileds
    struct json_object *energy;

    //struct json_object *friends;
	//struct json_object *friend;
	//size_t n_friends; // store the size of the array
    size_t i;

    fp = fopen("file.json","r"); // to open the json file
	fread(buffer, 1024, 1, fp); // to read the file and but its content into buffer
	fclose(fp); // close the file

	parsed_json = json_tokener_parse(buffer); // parese data and convert them into a json object

    json_object_object_get_ex(parsed_json, "finalCost", &finalCost); //to get the value of a key in json object
    json_object_object_get_ex(parsed_json, "energy", &energy);
    //json_object_object_get_ex(parsed_json, "friends" &friends);

    //printf("Final: %s\n", json_object_get_string(name));
    printf("Final Cost: %d\n", json_object_get_int(finalCost));
    printf("Energy: %d\n", json_object_get_int(energy));

    //n_friends = json_object_array_length(friends);
	//printf("Found %lu friends\n",n_friends);

	/* for(i=0;i<n_friends;i++) {
		friend = json_object_array_get_idx(friends, i);
		printf("%lu. %s\n",i+1,json_object_get_string(friend));
	} */

    /* int the_choice, i;
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

    printf("the cheapest scenario is: %d\n The cost is: %f", cheepst_scenario,minimum_cost); */

    return 0;
}



