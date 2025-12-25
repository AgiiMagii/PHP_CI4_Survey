<?php if (!empty($questions)): ?>
    <ul class="questions-item">
        <?php foreach ($questions as $question): ?>
            <li class="questions-list" data-id="<?= $question['Id_Question'] ?>">
                <h3 class="question-text"><?= esc($question['Question']) ?></h3>

                <div class="answers">
                    <div contenteditable="true"><?= esc($question['Answer1']) ?></div>
                    <div contenteditable="true"><?= esc($question['Answer2']) ?></div>
                    <div contenteditable="true"><?= esc($question['Answer3']) ?></div>
                    <div contenteditable="true"><?= esc($question['Answer4']) ?></div>
                </div>
                <div class="add-question">
                    <input type="text" id="new-question" placeholder="Question">
                    <input type="text" id="new-answer1" placeholder="Answer 1">
                    <input type="text" id="new-answer2" placeholder="Answer 2">
                    <input type="text" id="new-answer3" placeholder="Answer 3">
                    <input type="text" id="new-answer4" placeholder="Answer 4">
                    <input type="number" id="correct-answer" placeholder="Correct Answer (1-4)">
                </div>
            </li>
            <button id="add-question-btn">Add</button>
            <button id="edit-btn">Edit</button>
            <button id="save-btn">Save</button>
            <button id="delete-question-btn">Delete</button>
        <?php endforeach; ?>
        </ul>

    
<?php else: ?>
    <p>No questions found.</p>
<?php endif; ?>

