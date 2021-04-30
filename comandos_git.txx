-- Status do projeto
git status

-- Adicionar arquivos vermelhor
git add .

-- Mostrar os commits recentes
git log

-- Mostrar branch
git branch

-- Gerar novo commit
git commit -m "mensagem"

-- enviar commit para origin
git push

-- trazer commits da origin
git pull

git fetch origin   # update tudo da nuvem

git checkout demo         # if needed -- your example assumes you're on it
git merge origin/demo     # if needed -- see below

git checkout master
git merge origin/master 

git merge -X theirs demo   # but see below

git push origin master     # again, see below

-- Trazer branchs remotas
git fetch --all

-- Criar nova branch
git checkout -b feature_branch_name

-- Enviar nova branch para o servidor
git push -u origin feature_branch_name

-- Voltar um commit 
git reset --hard {hash-do-commit-desejado}

-- Apagar untracked files
git clean -f -d

-- Anexar nova branch com branch remota
git branch --set-upstream-to=origin/branch pedidos

-- Deletar branch
git branch -D nome-da-branch