
// Example starter JavaScript for disabling form submissions if there are invalid fields
//This code is for invalidation warning
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


//thid is for select option

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
            "Odd": ["CA1501", "CA1503", "CA1506", "CA15**", "CA15**", "CA1561", "CA1563"],
            "Even": ["CA1601", "CA1603", "CA16**", "CA16**", "CA1661", "CA1663", "CA1671"]
        }
    },
    "mca": {
        "1st-Year": {
            "Odd": ['CA2110 - COMPUTATIONAL MATHEMATICS', 'CA2111 - LATEST TREND IN COMPUTER', 'CA2112 - DATABASE MANAGEMENT SYSTEM', 'CA2113 - Operating System', 'CA2110 - ACCOUNTING & Managerial Economics', 'CA2114 - JAVA PROGRAMMING'],
            "Even": ['CA2208 - QUANTITATIVE ANALYSIS FOR COMPUTER APPLICATIONS', 'CA2211 - SOFTWARE ENGINERING &UML', 'CA2240 - ANGULAR JS, REACT JS and VUE JS', 'CA2239 - PYTHON PROGRAMMING (EL-1)', 'CA2241 - DATA WAREHOUSING & DATA MINING', 'CA2242 - CLOUD COMPUTING']
        },
        "2nd-Year": {
            "Odd": ['CA2212 - .NET FRAMEWORK', 'CA2213 - COMPUTER NETWORKS', 'CA2311 - FORMAL LANGUAGES AND AUTOMATA THEORY', 'CA2312 - DATA STRUCTURE AND ALGORITHMS', 'CA2313 - UNIX/LINUX INTERNAL', 'CA2344 - MACHINE LEARNING', 'CA2349 - BIG DATA & ITS Applications', 'CA2345 - BIG DATA ANALYTICS', 'CA2350 - VIRTUALIZATION AND CLOUD SECURITY'],
            "Even": ['CA2371 - MINI PROJECT', 'CA2381 - INDUSTRIAL TRAINING & COURSE WORK', 'CA2475 - MAJOR PROJECT']
        }
    }
};


document.getElementById("course").addEventListener("change", function () {
    var course = document.getElementById("course");
    var years = document.getElementById("years");
    var selectedValue = course.value;

    years.innerHTML = '<option value="" selected disabled>Select year</option>';
    semester.innerHTML = '<option value="">Select semester</option>';
    subjectId.innerHTML = '<option value="">Select subject</option>';

    for (var key in optionValues[selectedValue]) {
        var optionElement = document.createElement("option");
        optionElement.textContent = key;
        optionElement.value = key;
        years.appendChild(optionElement);
    }
});

document.getElementById("years").addEventListener("change", function () {
    var years = document.getElementById("years");
    var semester = document.getElementById("semester");
    var selectedValue = years.value;
    var course = document.getElementById("course");
    var selectedFirstValue = course.value;

    semester.innerHTML = '<option value="">Select semester</option>';
    subjectId.innerHTML = '<option value="">Select subject</option>';

    for (var key in optionValues[selectedFirstValue][selectedValue]) {
        var optionElement = document.createElement("option");
        optionElement.textContent = key;
        optionElement.value = key;
        semester.appendChild(optionElement);
    }
});

document.getElementById("semester").addEventListener("change", function () {
    var semester = document.getElementById("semester");
    var subjectId = document.getElementById("subjectId");
    var selectedValue = semester.value;
    var course = document.getElementById("course");
    var years = document.getElementById("years");
    var selectedFirstValue = course.value;
    var selectedSecondValue = years.value;

    subjectId.innerHTML = '<option value="">Select subject</option>';

    optionValues[selectedFirstValue][selectedSecondValue][selectedValue].forEach(function (option) {
        var optionElement = document.createElement("option");
        optionElement.textContent = option;
        optionElement.value = option;
        subjectId.appendChild(optionElement);
    });
});
