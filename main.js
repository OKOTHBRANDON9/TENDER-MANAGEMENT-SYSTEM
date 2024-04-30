// initialize swiper js

const swiper = new Swiper('.swiper', {
    loop: true,

     // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },


})
// r3views navigation code






//next page navigation code
document.addEventListener("DOMContentLoaded", function() {
  var tenderList = [
    // Existing tender data
  ];

  // Additional tender data for the next page
  var additionalTenderList = [
    // Add 20 additional tender objects here
  ];

  var itemsPerPage = 6;
  var currentPage = 1;

  function displayTenders(page) {
    var startIndex = (page - 1) * itemsPerPage;
    var endIndex = startIndex + itemsPerPage;
    var currentTenderList = (page === 1) ? tenderList : additionalTenderList;
    var tendersToDisplay = currentTenderList.slice(startIndex, endIndex);

    var tenderContainer = document.getElementById("tenderContainer");
    tenderContainer.innerHTML = "";

    tendersToDisplay.forEach(function(tender) {
      var tenderDiv = document.createElement("div");
      tenderDiv.innerHTML = `
        <h3>${tender.name}</h3>
        <p>Opening Date: ${tender.openingDate}</p>
        <p>Closing Date: ${tender.closingDate}</p>
        <p>Minimum Bid: ${tender.minBid}</p>
        <p>Description: ${tender.description}</p>
      `;
      tenderContainer.appendChild(tenderDiv);
    });
  }

  displayTenders(currentPage);

  document.getElementById("prevPageButton").addEventListener("click", function() {
    if (currentPage > 1) {
      currentPage--;
      displayTenders(currentPage);
    }
  });

  document.getElementById("nextPageButton").addEventListener("click", function() {
    var totalPages = Math.ceil((tenderList.length + additionalTenderList.length) / itemsPerPage);
    if (currentPage < totalPages) {
      currentPage++;
      displayTenders(currentPage);
    }
  });
});


//tenderList

      document.addEventListener("DOMContentLoaded", function() {
        var tenderList = [
          {
            id: 1,
            name: "Tender 1",
            openingDate: "2022-01-01",
            closingDate: "2022-01-31",
            minBid: 1000,
            description: "Description for Tender 1"
          },
          {
            id: 2,
            name: "Tender 2",
            openingDate: "2022-02-01",
            closingDate: "2022-02-28",
            minBid: 1500,
            description: "Description for Tender 2"
          },
          {
            id: 3,
            name: "Tender 3",
            openingDate: "2022-03-01",
            closingDate: "2022-03-31",
            minBid: 1200,
            description: "Description for Tender 3"
          },
          {
            id: 4,
            name: "Tender 4",
            openingDate: "2022-03-01",
            closingDate: "2022-03-31",
            minBid: 1200,
            description: "Description for Tender 3"
          },
          {
            id: 5,
            name: "Tender 5",
            openingDate: "2022-03-01",
            closingDate: "2022-03-31",
            minBid: 1200,
            description: "Description for Tender 3"
          },
          {
            id: 6,
            name: "Tender 6",
            openingDate: "2022-03-01",
            closingDate: "2022-03-31",
            minBid: 1200,
            description: "Description for Tender 3"
          },
          {
            id: 7,
            name: "Tender 7",
            openingDate: "2022-03-01",
            closingDate: "2022-03-31",
            minBid: 1200,
            description: "Description for Tender 3"
          }
        ];

        tenderList.forEach(function(tender, index) {
          var tenderDiv = document.getElementById("tender" + (index + 1));
          tenderDiv.innerHTML = `
            <h3>${tender.name}</h3>
            <p>Opening Date: ${tender.openingDate}</p>
            <p>Closing Date: ${tender.closingDate}</p>
            <p>Minimum Bid: ${tender.minBid}</p>
            <p>Description: ${tender.description}</p>
          `;
        });
      });
  

      // Sample FAQ data
const faqData = [
  { question: "How do I submit a tender proposal?", answer: "You can submit your proposal through the online portal or by email." },
  { question: "What are the evaluation criteria for tenders?", answer: "Tenders are evaluated based on price, quality, and compliance with specifications." },
  { question: "Can I modify my tender proposal after submission?", answer: "No, once a tender proposal is submitted, it cannot be modified." },
  { question: "How can I request clarification on tender specifications?", answer: "You can submit your clarification requests through the online portal or by contacting the tender administrator." }
];

// Populate FAQ section
const faqList = document.querySelector('.faq-list');
faqData.forEach(item => {
  const faqItem = document.createElement('li');
  faqItem.innerHTML = `<strong>${item.question}</strong><br>${item.answer}`;
  faqList.appendChild(faqItem);
});

// Generate calendar using a library like FullCalendar or create custom JavaScript to handle calendar functionality

// Additional JavaScript for form validation and submission for vendor registration
// Additional JavaScript for handling tender document download




 // JavaScript code for bid submission
 const bidForm = document.querySelector('#bid-form');

 bidForm.addEventListener('submit', function(event) {
   event.preventDefault(); // Prevent the form from submitting
   const tenderId = document.querySelector('#tender-id').value;
   const bidAmount = document.querySelector('#bid-amount').value;
   const bidDescription = document.querySelector('#bid-description').value;

   // Perform validation and submit the bid data to the server
   // You can use JavaScript fetch or XMLHttpRequest to send the bid data to the server
   // Example: Use fetch to send the bid data to the server
   fetch('/submit-bid', {
     method: 'POST',
     headers: {
       'Content-Type': 'application/json',
     },
     body: JSON.stringify({ tenderId, bidAmount, bidDescription }),
   })
   .then(response => {
     if (response.ok) {
       // Handle successful bid submission
       alert('Bid submitted successfully!');
     } else {
       // Handle error in bid submission
       alert('Failed to submit bid. Please try again.');
     }
   })
   .catch(error => {
     console.error('Error:', error);
     alert('An error occurred while submitting the bid. Please try again.');
   });
 });


 