<div class="question-section">
    <button class="btn-delete-template-question"><i class="fa-solid fa-xmark"></i></button>

    <div class="form-group">
        <label for="questions[]">Pergunta:</label>
        <input type="text" name="questions[]" class="js-inputs">
    </div>

    <div class="form-group">
        <div>
            <label for="answers[]">Selecione a alternativa correta:</label>
            <select name="answers[]" class="js-inputs">
                <option value="0">A</option>
                <option value="1">B</option>
                <option value="2">C</option>
                <option value="3">D</option>
            </select>
        </div>
        <div>
            <label for="options[]">Alternativas:</label>
            <div class="input-container">
                <span>A</span>
                <input type="text" name="options[]" class="js-inputs">
            </div>
            <div class="input-container">
                <span>B</span>
                <input type="text" name="options[]" class="js-inputs">
            </div>
            <div class="input-container">
                <span>C</span>
                <input type="text" name="options[]" class="js-inputs">
            </div>
            <div class="input-container">
                <span>D</span>
                <input type="text" name="options[]" class="js-inputs">
            </div>
        </div>
    </div>
</div>