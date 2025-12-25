

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
                const item = document.createElement('div');

                item.classList.add('accordion-item');

                item.innerHTML = `
                    <div class="accordion-header-wrapper">
                        <button class="accordion-header" data-test-id="${test.Id_Test}">
                            <h2>${test.Name}</h2>
                            <p><strong>Author:</strong> ${test.Author}</p>
                            <p><strong>Duration:</strong> ${test.Duration} min</p>
                        </button>

                        <div class="test-actions">
                            <button class="edit-test-btn" data-test-id="${test.Id_Test}">Edit</button>
                            <button class="delete-test-btn" data-test-id="${test.Id_Test}">Delete</button>
                        </div>
                    </div>

                    <div class="accordion-content"></div>
                `;

                container.appendChild(item);
            });

        })
        .catch(error => {
            console.error('Error fetching tests:', error);
            container.innerHTML = '<p>Error loading tests.</p>';
        });
});

// Akordeona toggle ar fetch jautājumiem
document.addEventListener('click', function(e) {
    const btn = e.target.closest('.accordion-header'); // tagad der div vai button
    if (!btn) return;

    const content = btn.parentElement.nextElementSibling; // accordion-content zem header-wrapper
    const isActive = btn.classList.contains('active');

    // Aizver visus akordeonus
    document.querySelectorAll('.accordion-header').forEach(h => h.classList.remove('active'));
    document.querySelectorAll('.accordion-content').forEach(c => c.classList.remove('show'));

    // Ja nebija aktīvs, tad atveram
    if (!isActive) {
        btn.classList.add('active');
        content.classList.add('show');
        fetchQuestions(btn.dataset.testId, content);
    }
});


// Fetch funkcija
function fetchQuestions(testId, content) {

    if (content.dataset.loaded === "1") return;
    content.dataset.loaded = "1";

    fetch(`/api/tests/${testId}/questions`)
        .then(res => res.json())
        .then(questions => {
            if (!questions.length) {
                content.innerHTML = '<p>No questions found.</p>';
                return;
            }

            let html = '';
            questions.forEach(q => {
                html += `
                    <div class="question-block">
                        <h4 contenteditable="true">${q.Question}</h4>
                        <p contenteditable="true">${q.Answer1}</p>
                        <p contenteditable="true">${q.Answer2}</p>
                        <p contenteditable="true">${q.Answer3}</p>
                        <p contenteditable="true">${q.Answer4}</p>
                    </div>
                `;
            });

            content.innerHTML = html;
        })
        .catch(error => {
            console.error('Error fetching questions:', error);
            content.innerHTML = '<p>Error loading questions.</p>';
        });
}




// // Iepriekšējā versija ar atsevišķiem klikšķu klausītājiem




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

