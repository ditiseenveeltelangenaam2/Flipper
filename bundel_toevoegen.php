<?php require_once 'includes/header.php'; ?>

<div class="form-container" style="max-width: 800px; margin: 0 auto; padding: 20px;">
    <h3>📦 Nieuwe bundel registreren</h3>
    <p>Vul de totale inkoopprijs in, en schat de losse verkoopwaarde per item. Het systeem berekent automatisch de exacte inkoopprijs per onderdeel op basis van de proportionele waarde.</p>
    
    <form method="POST" action="includes/actions.php" id="bundelForm">
        <input type="hidden" name="action" value="create_bundle">
        
        <div style="padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #444; background-color: rgba(0,0,0,0.2);">
            <label for="bundel_referentie" style="display: block; margin-bottom: 5px;">Bundel Referentie / Naam:</label>
            <input type="text" id="bundel_referentie" name="bundel_referentie" placeholder="bijv. Vinted-Lot-03072026" required style="width: 100%; margin-bottom: 15px;">

            <label for="totale_inkoop" style="display: block; margin-bottom: 5px;">Totale Inkoopprijs Bundel (€):</label>
            <input type="number" id="totale_inkoop" name="totale_inkoop" step="0.01" placeholder="47.00" required style="width: 100%;">
        </div>

        <hr style="border: 0; border-top: 1px solid #444; margin: 20px 0;">
        <h4 style="margin-bottom: 15px;">Items in deze bundel</h4>
        
        <div id="items-container">
            <div class="item-row" style="border: 1px solid #444; padding: 15px; margin-bottom: 15px; border-radius: 5px; background-color: rgba(0,0,0,0.1);">
                
                <label style="display: block; margin-bottom: 5px;">Categorie:</label>
                <select name="categorie[]" required style="width: 100%; margin-bottom: 15px;">
                    <option value="Console">🎮 Console</option>
                    <option value="Accessoire">🔌 Accessoire</option>
                    <option value="Spel">💿 Spel / Game</option>
                    <option value="Component">⚙️ Component / Onderdeel</option>
                </select>
                
                <label style="display: block; margin-bottom: 5px;">Merk:</label>
                <select name="merk[]" required style="width: 100%; margin-bottom: 15px;">
                    <option value="">-- Selecteer een merk --</option>
                    <option value="Sony">Sony</option>
                    <option value="Nintendo">Nintendo</option>
                    <option value="Microsoft">Microsoft</option>
                    <option value="Overig">Overig</option>
                </select>
                
                <label style="display: block; margin-bottom: 5px;">Specifiek Model / Game Titel:</label>
                <input type="text" name="model[]" required style="width: 100%; margin-bottom: 15px;">

                <label style="display: block; margin-bottom: 5px;">Geschatte Verkoopwaarde per stuk (€):</label>
                <input type="number" name="geschatte_waarde[]" step="0.01" placeholder="15.00" required style="width: 100%; margin-bottom: 15px;">
                
                <label style="display: block; margin-bottom: 5px;">Defect of bijzonderheden:</label>
                <textarea name="defect_beschrijving[]" rows="2" style="width: 100%;"></textarea>
            </div>
        </div>
        
        <button type="button" id="addItemBtn" style="padding: 10px 15px; background-color: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; margin-bottom: 20px;">
            + Extra Item Toevoegen
        </button>
        
        <br>
        
        <button type="submit" style="padding: 12px 20px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; width: 100%; font-size: 16px; font-weight: bold;">
            💾 Bundel Opslaan en Berekenen
        </button>
    </form>
</div>

<script>
document.getElementById('addItemBtn').addEventListener('click', function() {
    var container = document.getElementById('items-container');
    var firstRow = container.querySelector('.item-row');
    
    var clone = firstRow.cloneNode(true);
    
    var inputs = clone.querySelectorAll('input[type="text"], input[type="number"], textarea');
    inputs.forEach(function(input) {
        input.value = '';
    });
    
    var selects = clone.querySelectorAll('select');
    selects.forEach(function(select) {
        select.selectedIndex = 0;
    });
    
    container.appendChild(clone);
});
</script>

<?php require_once 'includes/footer.php'; ?>
