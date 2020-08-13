# !/bin/bash 

selectgitfile()
{
    local gfile
    read -e -p "Enter file for git add " gfile

    git add $gfile
    git status

    git commit -m " ... "
}
selectgitfile
