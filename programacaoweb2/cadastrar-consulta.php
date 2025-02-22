</br></br></br>
<h1>Cadastrar Consulta</h1>
<form action="?page=salvar-consulta" method="POST" onsubmit="return validarFormulario()">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Nome do PET</label>
		<select name="pet_id_pet" class="form-control">
			<option> -= Escolha um PET =- </option>
			<?php
			include 'E:\Xampp\htdocs\Exo-Pets\programacaoweb2\config.php';# - pc casa
			#include 'C:\xampp\htdocs\Emanuela\Projeto\config.php';# - pc faculdade
			$sql = "SELECT * FROM pet WHERE id_pet=".$_REQUEST['id_pet'];
				$sql_1 = "SELECT id_pet, nome_pet FROM pet";
				$res_1 = $conn->query($sql_1);
				$qtd_1 = $res_1->num_rows;
				if($qtd_1 > 0){
					while($row_1 = $res_1->fetch_object()){
						print "<option value='".$row_1->id_pet."'>".$row_1->nome_pet."</option>";
					}
				}
				else{
					print "<option>Não há Pets</option>";
				}
			?>
		</select>		
	</div>
	
	<div class="mb-3">
		<label>Nome do Veterinário</label>
		<select name="veterinario_id_veterinario" class="form-control">
			<option> -= Escolha um Veterinário =- </option>
			<?php
				$sql_2 = "SELECT id_veterinario, nome_veterinario FROM veterinario";
				$res_2 = $conn->query($sql_2);
				$qtd_2 = $res_2->num_rows;
				if($qtd_2 > 0){
					while($row_2 = $res_2->fetch_object()){
						print "<option value='".$row_2->id_veterinario."'>".$row_2->nome_veterinario."</option>";
					}
				}
				else{
					print "<option>Não há Veterinários</option>";
				}
			?>
		</select>		
	</div>
	<div class="mb-3">
		<label>Data da Consulta</label>
		<input type="date" name="data_consulta" class="form-control">
	</div>
	<div class="mb-3">
		<label>Hora da Consulta</label>
		<input type="time" name="hora_consulta" class="form-control">
	</div>
	<div class="mb-3">
		<label>Descrição</label>
		<textarea name="descricao_consulta" class="form-control"></textarea>
	</div>
	<div class="mb-3">
		<button type="submit" class="btn btn-success">Salvar</button>
	</div>
	
</form>

<div>


<script>
    function validarFormulario() {
    	
    	const veterinario = document.getElementById('veterinario_id_veterinario').value.trim();
        const pet = document.getElementById('pet_id_pet').value.trim();
        const data = document.getElementById('data_consulta').value.trim();
        const hora = document.getElementById('hora_consulta').value.trim();
        const descricao = document.getElementById('descricao_consulta').value.trim();

		if (veterinario === "-= Escolha um Veterinário =-") {
        alert('Por favor, escolha um Veterinário.');
        return false;
    	}
    	if (pet === "-= Escolha um PET =-") {
        alert('Por favor, escolha um PET.');
        return false;
    	}
        if (!data) {
            alert('Por favor, preencha a Data da consulta.');
            return false;
        }

        if (!hora) {
            alert('Por favor, preencha o Horário da consulta.');
            return false;
        }

		if (!descricao) {
            alert('Por favor, preencha a Descrição da consulta.');
            return false;
        }
        return true; // Submete o formulário se todos os campos forem válidos
    }
</script>	