function searchRecipe() {
    // Captura do elemento de entrada de pesquisa
    var searchInput = document.getElementById("searchInput");
    // Captura do container de receitas
    var recipeContainer = document.getElementById("recipeContainer");
    //Captura do valor digitado na caixa de pesquisa
    var searchTerm = searchInput.value.toLowerCase();

    if (searchTerm === "pizza portuguesa") {
      // Se a pesquisa for por "pizza portuguesa", exibe a receita correspondente
      recipeContainer.innerHTML = `
        <div class="col-md-4">
          <div class="recipe-container">
            <h3>Pizza Portuguesa</h3>
            <p>Ingredientes:</p>
            <ul>
              <li>Massa de pizza pré-pronta</li>
              <li>Molho de tomate</li>
              <li>Queijo mussarela ralado</li>
              <li>Fatias de presunto</li>
              <li>Rodelas de cebola</li>
              <li>Fatias de tomate</li>
              <li>Azeitonas pretas sem caroço</li>
              <li>Orégano a gosto</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="recipe-container">
            <h3>Pizza Portuguesa Vegetariana</h3>
            <p>Ingredientes:</p>
            <ul>
              <li>Massa de pizza pré-pronta</li>
              <li>Molho de tomate</li>
              <li>Queijo mussarela ralado</li>
              <li>Rodelas de cebola</li>
              <li>Fatias de tomate</li>
              <li>Azeitonas pretas sem caroço</li>
              <li>Orégano a gosto</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="recipe-container">
            <h3>Pizza Portuguesa Vegana</h3>
            <p>Ingredientes:</p>
            <ul>
              <li>Massa de pizza pré-pronta (verifique se é vegana)</li>
              <li>Molho de tomate</li>
              <li>Queijo vegano ralado</li>
              <li>Presunto vegano em fatias (opcional)</li>
              <li>Rodelas de cebola</li>
              <li>Fatias de tomate</li>
              <li>Azeitonas pretas sem caroço</li>
              <li>Orégano a gosto</li>
            </ul>
          </div>
        </div>`;
    } else {
      // Caso contrário, exibe uma mensagem informando que nenhuma receita foi encontrada
      recipeContainer.innerHTML = "<p class='col-lg-12 recipe-content'>Não encontramos uma receita para sua pesquisa.</p>";
    }
}