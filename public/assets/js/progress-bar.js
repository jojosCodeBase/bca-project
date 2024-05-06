
  // Function to start the task
  function startTask() {
    // Display progress bar
    document.getElementById("progressContainer").style.display = "block";

    // Simulate task completion (you can replace this with your actual task)
    let progress = 0;
    const interval = setInterval(function() {
      progress += 10;
      document.getElementById("progressBar").style.width = progress + "%";
      document.getElementById("progressBar").setAttribute("aria-valuenow", progress);
      
      if (progress >= 100) {
        clearInterval(interval); // Stop the interval
        document.getElementById("progressContainer").style.display = "none"; // Hide progress bar
      }
    }, 1000); // Update every second (you can adjust this interval)
  }

  // Add click event listener to the button
  document.getElementById("myButton").addEventListener("click", startTask);
