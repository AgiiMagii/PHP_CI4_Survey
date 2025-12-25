
document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.tests-container');

    fetch('/api/tests')
        .then(response => response.json())
        .then(tests => {
            if (!tests.length) {
                container.innerHTML = '<p>No tests found.</p>';
                return;
            }

            tests.forEach(test => {
                const card = document.createElement('div');
                card.className = 'test-card';
                card.dataset.testId = test.Id_Test;

                card.innerHTML = `
                    <h2>${test.Name}</h2>
                    <p><strong>Author:</strong> ${test.Author}</p>
                    <p><strong>Duration:</strong> ${test.Duration} min</p>
                `;

                container.appendChild(card);
            });
        })
        .catch(error => {
            console.error('Error fetching tests:', error);
            container.innerHTML = '<p>Error loading tests.</p>';
        });
});








// document.addEventListener('DOMContentLoaded', function() {
//   // TEST CARD klikšķi
//   const testCards = document.querySelectorAll('.test-card');
//   testCards.forEach(card => {
//     card.addEventListener('click', function() {
//       const testId = this.getAttribute('data-test-id');
//       openQuestions(testId);
//     });

//     card.addEventListener('keypress', function(e) {
//       if (e.key === 'Enter' || e.key === ' ') {
//         e.preventDefault();
//         const testId = this.getAttribute('data-test-id');
//         openQuestions(testId);
//       }
//     });
//   });

  // QUESTION CARD klikšķi
//   const questionCards = document.querySelectorAll('.question-card');
//   questionCards.forEach(card => {
//     card.addEventListener('click', function() {
//       const questionId = this.getAttribute('data-question-id');
//       openQuestion(questionId); // JAUNĀ FUNKCIJA jautājuma atvēršanai
//     });

//     card.addEventListener('keypress', function(e) {
//       if (e.key === 'Enter' || e.key === ' ') {
//         e.preventDefault();
//         const questionId = this.getAttribute('data-question-id');
//         openQuestion(questionId);
//       }
//     });
//   });


// // Atver visu testa jautājumus
// function openQuestions(testId) {
//   document.getElementById('questions-tab').style.display = 'block';

//   fetch(`/tests/questions/${testId}`)
//     .then(res => res.text())
//     .then(html => {
//       document.getElementById('questions-tab').innerHTML = html;
//     });
// }

// // Atver konkrētu jautājumu (ja vajag)
// function openQuestion(questionId) {
//   console.log("Atveram jautājumu ar ID:", questionId);
//   // Šeit vari ielādēt jautājumu detaļas vai parādīt rediģējamu elementu
// }

