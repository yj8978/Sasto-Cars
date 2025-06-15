document.addEventListener('DOMContentLoaded', function() {
  const links = document.querySelectorAll('.sidebar a');
  const mainContent = document.getElementById('main-content');

  function bindEditBtn(){
      const editTriggers = document.querySelectorAll('.edit-btn');
 
  //Event-listener for edit button 
  editTriggers.forEach(
    btn => {
      btn.addEventListener('click',()=>{
         const dataID = btn.dataset.id;
         const editForm = document.getElementById('edit-form-'+dataID);
         if(editForm.style.display == "none")
         {
          editForm.style.display = "table-row";
          console.log(dataID);
         }
         else
         {
          console.log("Cannot trigger edit");
         }
      });
    }
  );
  }

    function bindDeleteBtn(){
      const deleteTriggers = document.querySelectorAll('.delete-btn');
 
  //Event-listener for edit button 
  deleteTriggers.forEach(
    btn => {
      btn.addEventListener('click',()=>{
         const dataID = btn.dataset.id;
         const deleteForm = document.getElementById('delete-form-'+dataID);
         if(deleteForm.style.display == "none")
         {
          deleteForm.style.display = "table-row";
          console.log(dataID);
         }
         else
         {
          console.log("Cannot trigger delete");
         }

      });
    }
  );
  }

  // Add click event listeners to each sidebar link
  links.forEach(link => {
    link.addEventListener('click', function(event) {
      event.preventDefault(); // Prevent the default action of link (navigation)
      const page = this.getAttribute('data-page'); // Get the value of the 'data-page' attribute
      loadPageContent(page); // Load the content dynamically
    });
  });

  // Function to load page content dynamically
  function loadPageContent(page) {
    fetch(page)
      .then(response => {
        if (!response.ok) {
          throw new Error('Page not found');
        }
        return response.text(); // Get the page content as text (HTML)
      })
      .then(content => {
        mainContent.innerHTML = content; // Update the main content with the page content
        bindEditBtn();
        bindDeleteBtn();
      })
      .catch(error => {
        mainContent.innerHTML = `<p>Error loading page: ${error.message}</p>`;
      });
  }

    });




