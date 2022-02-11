//const apiLink = 'http://localhost/MasterThesis/json/sort_by_chipest_list.json-${key}';
// I want to fetch data from the api

async function apiData() {

    //const apiLink = 'Matlab/Results/sort_by_chipest_list.json';
    //const apiLink = 'E:/Development/Laravel/Thesis_Tool/public/MatlabCodes/Results';
    const apiLink = 'http://dummy.restapiexample.com/api/v1/employees';

    const response = await fetch(apiLink);
    const datapoints = await response.json();
    console.log(datapoints);

    // const salary = datapoints.data.map((amount) => amount.employee_salary)
    // final_cost = salary

    // const fullname  = datapoints.data.map((name) => name.employee_name)
    // scenario = fullname

    //FILTER
    const staffData = datapoints.data.map((staff) => {
        console.log(staff)
        if(staff.employee_salary > 299999) {
            final_cost.push(staff.employee_salary)
            scenario.push(staff.employee_name)
        }
    })
}

// let scenario = [];
// let final_cost = [];
