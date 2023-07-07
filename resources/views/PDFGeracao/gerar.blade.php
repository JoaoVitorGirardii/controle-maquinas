<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Relatório</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            text-align: center;
        }
        .divider {
            border-bottom: 1px solid #000;
            margin-bottom: 20px;
        }
        .field {
            margin-bottom: 10px;
        }
        .field label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Relatório</h1>
    <div class="divider"></div>
    
    <div class="field">
        <label>Quantidade de Funcionários:</label>
        <span>{{ $qtd_funcionarios }}</span>
    </div>
    
    <div class="field">
        <label>Quantidade de Serviços:</label>
        <span>{{ $qtd_servico }}</span>
    </div>
    
    <div class="field">
        <label>Serviços Cadastrados:</label>
        <span>{{ $qtd_servico_cadastrado }}</span>
    </div>
    
    <div class="field">
        <label>Serviços Iniciados:</label>
        <span>{{ $qtd_servico_iniciado }}</span>
    </div>

    <div class="field">
        <label>Serviços Parados:</label>
        <span>{{ $qtd_servico_parado }}</span>
    </div>

    <div class="field">
        <label>Serviços Finalizados:</label>
        <span>{{ $qtd_servico_finalizado }}</span>
    </div>

    <div class="field">
        <label>Quantidade de Maquinas:</label>
        <span>{{ $qtd_maquinas }}</span>
    </div>
    
</body>
</html>
