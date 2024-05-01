@extends('layout')
@section('content')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
.section h2 {
    text-align: center;
    margin: 0; /* Remove default margin */
}
.form-select {
  width: auto; /* Adjust width as needed */
  display: inline-block; /* Display inline */
  margin-right: 10px; /* Adjust margin as needed */
}
/* Modal styles */
.modal {
    display: none;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 40%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Section styles */
.section {
    background-color:#808080; /* Blue background color */
    color: #fff; /* White text color */
    padding: 10px;
    margin-bottom: 10px;
    cursor: pointer;
    width: 800px;
    margin: 0 auto;  
}

.section:hover {
    background-color: #007bff; /* Darker blue on hover */
}

.section-content {
    display: none; /* Initially hidden */
}

.section.expanded .section-content {
    display: block; /* Display when expanded */
}
</style>

<select id="myselect" class="form-select form-select-sm" aria-label="Default select example">
  <option selected disabled>Add Content</option>
  <option value="1">Add Section</option>
  <option value="2">Add Quiz</option>
</select>

<div id="myModal" class="modal">
    <div class="modal-content">
        <span class="close" id="spanid">&times;</span>
        <p>Enter Name:</p>
        <input type="text" id="nameInput">
        <button id="submitBtn">Submit</button>
    </div>
</div>

<div id="sections-container">
    <!-- New sections will be added here -->
</div>

<script>
var sectionsContainer = document.getElementById("sections-container"); // Define sectionsContainer globally

var select = document.getElementById("myselect");
var modal = document.getElementById("myModal");
var span =  document.getElementById("spanid");

select.addEventListener('change', function(){
  var selectoption = select.options[select.selectedIndex].value;
  if(selectoption == 1){
    modal.style.display = "block";
  }
});

span.onclick = function() {
    modal.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Function to create a new section
function createNewSection(title) {
    var section = document.createElement("div");
    section.classList.add("section");
    section.innerHTML = `
        <h2>${title}</h2>
        <div class="section-content">
            <select class="form-select" aria-label="Default select example">
                <option selected disabled>Add content</option>
                <option value="video">Add video</option>
                <option value="pdf">Add PDF</option>
            </select>
            <button class="add-btn">Add</button>
            <div class="added-content"></div>
        </div>
    `;
    sectionsContainer.appendChild(section);

    section.querySelector('.section-content select').addEventListener('click', function(event) {
        event.stopPropagation();
    });

    

    section.addEventListener('click', function() {
        section.classList.toggle("expanded");
    });
}







// Function to handle form submission
var submitBtn = document.getElementById("submitBtn");
submitBtn.addEventListener("click", function() {
    var sectionTitle = document.getElementById("nameInput").value;
    if (sectionTitle) {
        createNewSection(sectionTitle);
        modal.style.display = "none";
    } else {
        alert("Please enter a title for the section.");
    }
});
</script>
@endsection
