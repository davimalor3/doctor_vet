#!/bin/bash
set -euo pipefail

echo "Continuando commits a partir do commit 12..."
echo "Se qualquer arquivo estiver faltando, o script irá parar."

# Função para validar arquivo antes do commit
check_file() {
    if [[ ! -f "$1" ]]; then
        echo ""
        echo "❌ ERRO: Arquivo não encontrado:"
        echo "   → $1"
        echo "O script foi interrompido no commit: $2"
        echo "Corrija o problema e rode novamente."
        exit 1
    fi
}

########################################
# Commit 38 - atualização header com lógica de sessão
########################################
check_file "includes/header.php" "feat(includes): atualização do header com lógica de sessão"
git add includes/header.php
git commit -m "feat(includes): atualização do header com lógica de sessão"
echo "✔ Commit 38 concluído!"

########################################
# Commit 39 - refatoração header + css
########################################
check_file "includes/header.php" "refactor(ui): refatoração do header e css para novo padrão visual"
check_file "assets/css/style.css" "refactor(ui): refatoração do header e css para novo padrão visual"
git add includes/header.php assets/css/style.css
git commit -m "refactor(ui): refatoração do header e css para novo padrão visual"
echo "✔ Commit 39 concluído!"

echo "================================="
echo "TODOS OS COMMITS RESTANTES FORAM CRIADOS!"
echo "================================="
