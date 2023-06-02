<?php include 'layout-top.php' ?>


<form method='POST' action='<?=route('obras/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
    Modelo
    <select name="modelo_id" class="form-control">
        <?php
        foreach($modelos as $modelo){
            _v($data,"modelo_id") == $modelo['id'] ? $selected='selected' : $selected='';
            print "<option value='{$modelo['id']}' $selected>{$modelo['modelo']}</option>";
        }
        ?>
    </select>
</label>


<label class='col-md-2'>
    Editora
    <input type="text" class="form-control" name="editora" value="<?=_v($data,"editora")?>" >
</label>

<label class='col-md-2'>
    Ano
    <input type="text" class="form-control" name="ano" value="<?=_v($data,"ano")?>" >
</label>


<label class='col-md-6'>
    Colecionadores
    <select name="colecionador_id" class="form-control">
        <option></option>
        <?php
        foreach($artistas as $usu){
            print "<option value='{$usu['id']}'>{$usu['nome']}</option>";
        }
        ?>
    </select>  
</label>

<?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Nome</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($colecionadores as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <td>
                    <a href='<?=route("obras/deletarColecionador/{$item['id']}")?>'>Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>    
    <?php endif; ?>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("obras")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Modelo</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("obras/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['modelo']?></td>
            <td>
                <a href='<?=route("obras/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>