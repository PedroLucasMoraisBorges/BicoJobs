<h1 align="center">BicoJobs</h1>

<p>Esse projeto é um banco de dados onde os usuários poderão tanto requisitar quantos ofertar estes serviços, a fim de auxilixar a sua empregabilidade.</p>
<p>Esse projeto é um banco de dados de currículos e vagas para seleção dos melhores profissionais para a vaga especifíca, tornando de fácil seleção para os professores a indicação da vaga ofertada.</p>

<h3 align="center">Sumário</h3>

* [Links úteis](#links-úteis)

* [Tecnologias utilizadas](#tecnologias-utilizadas)

* [Guia do Projeto:](#guia-do-projeto)
  * [Pastas](#pastas)

# Links úteis:

* [Pasta no Drive](https://drive.google.com/drive/folders/1DtJTVwfJJSmBEWlgLLxBniUa3ip_XvdR?usp=sharing)

* [Design no Figma](https://www.figma.com/file/NCuPC1IyIM3js3Tjs8OdUM/BicoJobs?type=design&node-id=0-1&t=bCfgK7WsuKQQMNh5-0)

* [Repositório no Github](https://github.com/SrTorpedro/BicoJobs)

# Tecnologias utilizadas:

* [Xampp](https://www.apachefriends.org/pt_br/index.html)

* [MySql](https://www.mysql.com/) (Durante o desenvolvimento está sendo usado o SQL)

* [Composer](https://getcomposer.org/download/) (Para fazer a instalação do ORM)

* [Doctrine](https://www.doctrine-project.org/projects/orm.html) (ORM escolhido)

# Instalação:


## 1. Repositório:

Clone o repositório através do comando:
```
git clone https://github.com/SrTorpedro/BicoJobs
```
OU você pode usar a extensão do VSCode para clonar.

## 2. Composer:

Efetue o download do compose segindo link oferecido:

Para testar se foi instalado corretamente tecle windows + R e digite cmg:

No terminar verifice o comando 
```
composer -v
```

## 3.Doctrine:

Após instalar o Composer, no terminal do VSCode, com o projeto aberto user o comando:
```
composer require doctrine/orm
```
Logo após fazer todas as inslações use o comando:
```
composer suggest
```
Depois disso use o comando:
```
composer require symfony/cache
```
E pronto, o Doctrine foi instalado corretamente


# Guia do Projeto

## Pastas:

### model:

Guarda as classes utilizadas na aplicação.

### Conection:

Dedicada aos arquivos que envolva conexão, como o logout.

### Functions:

Pasta para separar as funções que irão receber os POSTs e GETs utilizadas no formulários e utilizar os dados para instanciar as classes.

### Media:

Pasta para organizar os uploads feitos na plataforma.

### Static:

Essa é a pasta responsável por armazenar os arquivos estáticos do projeto, como arquivos CSS, JavaScript e imagens, independente de qual aplicativo eles serão usados.

### Templates:

Essa é a pasta responsável por armazenar os arquivos HTML do projeto, independente de qual aplicativo esse template será usado.

### Url's:

Pasta para guardar os caminhos da plataforma.