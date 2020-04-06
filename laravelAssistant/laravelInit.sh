# This is a file that you can put it in your laravel project to fast deploy setting

cp .env.example .env
"/laradock" >> .gitignore
git clone https://github.com/Laradock/laradock.git
cd laradock
cp env-example .env
rm -rf .git
cd ../
