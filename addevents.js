

document.getElementById("addEventBtn").onclick=function() {
 
  document.getElementById("eventForms").innerHTML = `
      <div class="mt-4 border p-3">
        <h4>Event Details</h4>
        <form action="process_form.php" method="POST">
          <div class="form-group">
            <label for="eventName">Event Name:</label>
            <input type="text" class="form-control" name="eventName" required>
          </div>
          <div class="form-group">
            <label for="eventDate">Event Date:</label>
            <input type="date" class="form-control" name="eventDate" required>
          </div>
          <div class="form-group">
            <label for="eventTime">Event Time:</label>
            <input type="time" class="form-control" name="eventTime" required>
          </div>
          <div class="form-group">
            <label for="eventVenue">Event Venue:</label>
            <input type="text" class="form-control" name="eventVenue" required>
          </div>
          <div class="form-group">
            <label for="eventCoordinator">Event Coordinator:</label>
            <input type="text" class="form-control" name="eventCoordinator" required>
          </div>
          <div class="form-group">
            <label for="eventBudget">Event Budget:</label>
            <input type="number" class="form-control" name="eventBudget" required>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    `;
 
 
  }
