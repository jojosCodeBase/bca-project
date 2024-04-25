//thid is for select option

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()

function getFacultyInfo(fid, callback) {
    $.ajax({
        url: '/admin/getFacultyInfo/' + fid,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            callback(response[0]);
            // console.log(response);
        },
        error: function (xhr, status, error) {
            console.error(xhr.responseText);
        }
    });
}

$(document).ready(function () {
    $(document).on('click', '.facultyViewButton', function () {
        var fid = $(this).closest('tr').find('.facultyId').text();
        getFacultyInfo(fid, function (response) {
            $('#faculty-view-id').text(response.regno);
            $('#faculty-view-email').text(response.email);
            $('#faculty-view-name').text(response.name);
            $('#facultyViewModal').modal('show');
        });
    });

    $(document).on('click', '#editFacultyBtn', function () {
        var fid = $(this).closest('tr').find('.facultyId').text();

        getFacultyInfo(fid, function (response) {
            $('#faculty-edit-id').val(response.regno);
            $('#faculty-edit-email').val(response.email);
            $('#faculty-edit-name').val(response.name);
            $('#facultyEditModal').modal('show');
        });
    });
    $(document).on('click', '#deleteFacultyBtn', function() {
        $('#delete-faculty-id').val(($(this).data('faculty-id')));
    });

    $(document).on('input','#searchInput', function () {
        const searchQuery = this.value.trim();
        // Send AJAX request to the server
        fetch(`/course/search?query=${encodeURIComponent(searchQuery)}`)
            .then(response => response.json())
            .then(data => {
                // Update table rows with filtered data
                const tableBody = document.querySelector('#table tbody');
                tableBody.innerHTML = '';


                if (data.length === 0) {
                    // If no results found, display a message
                    tableBody.innerHTML = `
                    <tr>
                    <td colspan="3" class="text-center text-muted">No results found</td>
                    </tr>
                    `;
                }
                else {
                    if ($('#searchInput').val() == '') {
                        $('#pagination').css('display', 'block');
                    } else {
                        $('#pagination').css('display', 'none');
                    }
                    data.forEach(course => {
                        tableBody.innerHTML += `
                    <tr>
                        <td class="courseId">${course.cid}</td>
                        <td>${course.cname}</td>
                        <td>
                            <div class="more-btn">
                                <button class="dropdown" type="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="bi bi-three-dots fs-4"></i>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <button class="dropdown-item editButton" type="button" data-bs-toggle="modal"
                                            data-bs-target="#editSubjectModal">Edit</button>
                                    </li >
                                    <li>
                                        <button class="dropdown-item deleteBtn" type="button"
                                            data-bs-toggle="modal"
                                            data-bs-target="#deleteSubjectModal" data-course-id=${course.cid}>Delete</button>
                                    </li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                `;
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });

    // faculty search ajax

    $('#facultySearch').on('input', function () {
        var searchString = $(this).val();
        // alert(searchString);
        $.ajax({
            type: 'GET',
            url: '/admin/get-faculty-info/',
            data: {
                searchData: searchString,
            },
            success: function (response) {
                $('.facultyFilter').html(response);
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    $('#co_po_search').on('input', function () {
        var searchString = $(this).val();
        // alert(searchString);
        $.ajax({
            type: 'GET',
            url: '/admin/get-co_po_relation/',
            data: {
                searchData: searchString,
            },
            success: function (response) {
                $('.co_po_filter').html(response);
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error(error);
            }
        });
    });

    // edit subject modal ajax
    // $('.editButton').click(function () {
    $(document).on('click', '.editButton', function () {
        var cid = $(this).closest('tr').find('.courseId').text();
        $.ajax({
            url: '/admin/getCourseInfo/' + cid,
            type: 'GET',
            dataType: 'json',
            success: function (response) {
                console.log(response[0]);
                $('#edit-modal-subject-code').val(response[0].cid);
                $('#edit-modal-subject-name').val(response[0].cname);
                $('#editSubjectModal').modal('show');
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});

var optionValues = {
    "bca": {
        "1st-Year": {
            "Odd": ["MATHEMATICS–I(MA1104)", "FUNDAMENTALS OF COMPUTER AND MULTIMEDIA TECHNOLOGIES (CA1106)", "FUNDAMENTALS OF BUSINESS MANAGEMENT(BA1110)", "PROGRAMMING-I(CA1104C) ", "FUNDAMENTALS OF DIGITAL ELECTRONICS(CA1105)", "PC CONFIGURATION LAB(CA1163)", "C PROGRAMMING–I LAB(CA1162)"],
            "Even": ["MA1204", "BA1202", "BA1210", "CA1204", "CA1205", "CA1261", "CA1262"]
        },
        "2nd-Year": {
            "Odd": ["MA1304", "CA1302", "CA1303", "CA1304", "BA1337/BA1537", "CA1361", "CA1362"],
            "Even": ["CA1401", "CA1402", "CA1404", "CA1408", "CA1407", "CA1461", "CA1462"]
        },
        "3rd-Year": {
            "Odd": ["CA1501", "CA1503", "CA1506", "CA15*", "CA15*", "CA1561", "CA1563"],
            "Even": ["CA1601", "CA1603", "CA16*", "CA16*", "CA1661", "CA1663", "CA1671"]
        }
    },
    "mca": {
        "1st-Year": {
            "Odd": ['CA2110 - COMPUTATIONAL MATHEMATICS', 'CA2111 - LATEST TREND IN COMPUTER', 'CA2112 - DATABASE MANAGEMENT SYSTEM', 'CA2113 - Operating System', 'CA2110 - ACCOUNTING & Managerial Economics', 'CA2114 - JAVA PROGRAMMING'],
            "Even": ['CA2208 - QUANTITATIVE ANALYSIS FOR COMPUTER APPLICATIONS', 'CA2211 - SOFTWARE ENGINERING &UML', 'CA2240 - ANGULAR JS, REACT JS and VUE JS', 'CA2239 - PYTHON PROGRAMMING (EL-1)', 'CA2241 - DATA WAREHOUSING & DATA MINING', 'CA2242 - CLOUD COMPUTING']
        },
        "2nd-Year": {
            "Odd": ['CA2212 - .NET FRAMEWORK', 'CA2213 - COMPUTER NETWORKS', 'CA2311 - FORMAL LANGUAGES AND AUTOMATA THEORY', 'CA2312 - DATA STRUCTURE AND ALGORITHMS', 'CA2313', 'CA2344 - MACHINE LEARNING', 'CA2349 - BIG DATA & ITS Applications', 'CA2345 - BIG DATA ANALYTICS', 'CA2350 - VIRTUALIZATION AND CLOUD SECURITY'],
            "Even": ['CA2371 - MINI PROJECT', 'CA2381 - INDUSTRIAL TRAINING & COURSE WORK', 'CA2475 - MAJOR PROJECT']
        }
    }
};


// document.getElementById("course").addEventListener("change", function () {
//     alert('x');
//     var course = document.getElementById("course");
//     var years = document.getElementById("year");
//     var selectedValue = course.value;

//     years.innerHTML = '<option value="" selected disabled>Select year</option>';
//     semester.innerHTML = '<option value="">Select semester</option>';
//     subjectId.innerHTML = '<option value="">Select subject</option>';

//     for (var key in optionValues[selectedValue]) {
//         var optionElement = document.createElement("option");
//         optionElement.textContent = key;
//         optionElement.value = key;
//         years.appendChild(optionElement);
//     }
// });

// document.getElementById("year").addEventListener("change", function () {
//     var years = document.getElementById("year");
//     var semester = document.getElementById("semester");
//     var selectedValue = years.value;
//     var course = document.getElementById("course");
//     var selectedFirstValue = course.value;

//     semester.innerHTML = '<option value="">Select semester</option>';
//     subjectId.innerHTML = '<option value="">Select subject</option>';

//     for (var key in optionValues[selectedFirstValue][selectedValue]) {
//         var optionElement = document.createElement("option");
//         optionElement.textContent = key;
//         optionElement.value = key;
//         semester.appendChild(optionElement);
//     }
// });

// document.getElementById("semester").addEventListener("change", function () {
//     var semester = document.getElementById("semester");
//     var subjectId = document.getElementById("subjectId");
//     var selectedValue = semester.value;
//     var course = document.getElementById("course");
//     var years = document.getElementById("year");
//     var selectedFirstValue = course.value;
//     var selectedSecondValue = years.value;

//     subjectId.innerHTML = '<option value="">Select subject</option>';

//     optionValues[selectedFirstValue][selectedSecondValue][selectedValue].forEach(function (option) {
//         var optionElement = document.createElement("option");
//         optionElement.textContent = option;
//         optionElement.value = option;
//         subjectId.appendChild(optionElement);
//     });
// });

// javaScript for number restiction start

function restrictAlphabets(event) {
    let x = event.which || event.keyCode;
    if ((x >= 48 && x <= 57) || x === 8) {
        return true;
    } else {
        event.preventDefault();
        return false;
    }
}
// javaScript for number restiction end

// javaScript for Alphabet restiction start

function restrictInput(event) {
    // Get the key code of the pressed key
    let keyCode = event.keyCode || event.which;
    // Allow only alphanumeric characters
    let allowedChars = /[1-3]/;
    let keyChar = String.fromCharCode(keyCode);
    // Check if the input length is already 1
    if (event.target.value.length >= 1 || !allowedChars.test(keyChar)) {
        // If the input length is already 1 or the pressed key is not alphanumeric, prevent the default action (typing)
        event.preventDefault();
        return false;
    }
}

// javaScript for Alphabet restiction end

// javaScript for Sidebar Toggle start

// const sidebarToggle = document.querySelector("#sidebar-toggle");
// sidebarToggle.addEventListener("click",function(){
//   document.querySelector("#sidebar").classList.toggle("collapsed");
// })
// javaScript for Sidebar Toggle start
