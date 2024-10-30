$(document).ready(function () {
    new DataTable('#example', {
        layout: {
            topStart: {
                //buttons: ['copy', 'excel', 'pdf', 'colvis']
                buttons: ['copy', 'excel', 'pdf']
            }
        }
    });

    // Select all tables with the class 'data-table'
    //const tables = document.querySelectorAll('.data-table');

    // Initialize DataTable for each table found
    // tables.forEach((table) => {
    //     new DataTable(table, {
    //         columnDefs: [
    //             {
    //                 orderable: false,
    //                 render: DataTable.render.select(),
    //                 targets: 0
    //             }
    //         ],
    //         layout: {
    //             topStart: {
    //                 buttons: ['copy', 'excel', 'pdf'] // Adjust buttons as needed
    //             }
    //         },
    //         select: {
    //             style: 'os',
    //             selector: 'td:first-child'
    //         }
    //     });
    // });

});

