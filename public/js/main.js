$.extend($.fn.dataTable.ext.type.order, {
    "date-format-pre": function (date) {
        // Convert the date to a sortable format (e.g., "2015-01-12")
        const parts = date.split(" ");
        const day = parts[0];
        const month = parts[1].toLowerCase();
        const year = parts[2];
        const monthMap = {
            january: "01",
            february: "02",
            march: "03",
            april: "04",
            may: "05",
            june: "06",
            july: "07",
            august: "08",
            september: "09",
            october: "10",
            november: "11",
            december: "12",
        };
        return `${year}-${monthMap[month]}-${day}`;
    },

    "date-format-asc": function (a, b) {
        return a > b ? 1 : a < b ? -1 : 0;
    },

    "date-format-desc": function (a, b) {
        return a > b ? -1 : a < b ? 1 : 0;
    },
});

$(document).ready(function () {
    var table = $("#myTable").DataTable({
        searching: true,
        columnDefs: [
            {
                targets: [1], // Assuming "Order ID" is the second column (index 1)
                type: "num", // Use numeric sorting for "Order ID"
            },
            {
                targets: [4], // Assuming "Jadwal" is the fifth column (index 4)
                type: "date-format", // Use custom date sorting
            },
        ],
        order: [
            [4, "desc"], // Default sorting by "Jadwal" in descending order
        ],
        language: {
            searchPlaceholder: "Search...", // Set the placeholder text
        },
        initComplete: function () {
            // Add Tailwind classes to the search input element
            var searchInput = $(".dataTables_filter input");
            searchInput.addClass(
                "px-3 py-2 border rounded-lg placeholder-gray-400 focus:outline-none focus:ring focus:border-blue-300"
            );
        },
    });

    // Add row numbers based on DataTables order
    table
        .on("order.dt search.dt", function () {
            table
                .column(0, { search: "applied", order: "applied" })
                .nodes()
                .each(function (cell, i) {
                    cell.innerHTML = i + 1;
                });
        })
        .draw();
});
