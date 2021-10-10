#!/bin/bash

function master () {
branch_name="master"
git_url="git@github.com:azatuni/angular-test-project.git"
runner="build"
deploy_path="deployer@prod:/var/www/html/chroot.cf"
echo "N" | deploy_server
}

function development () {
branch_name="development"
git_url="git@github.com:azatuni/angular-test-project.git"
runner="build-dev"
deploy_path="deployer@prod:/var/www/html/dev.chroot.cf"
echo "N" | deploy_server
}


function deploy_server () {
git clone -b $branch_name $git_url $branch_name
cd $branch_name
npm install
npm run  $runner
rsync -avz --delete dist/ $deploy_path
mv dist ~/Arxiv/$branch_name"_"$(date -d "-1 day" +'%Y-%m-%d')
cd ..
rm -rf $branch_name
}


if [[ $1 = "prod" ]]
then master
elif [[ $1 = "dev" ]]
then development
else
echo -e "\e[91mplease choose \e[92mprod \e[91mor \e[92mdev \e[39m"
fi
