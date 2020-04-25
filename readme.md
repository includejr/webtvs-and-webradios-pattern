# Modelo de desenvolvimento de WebTVs e WebRádios/sites de notícias

Hello, Devs. Este é um repositório com o padrão de desenvolvimento de WebTVs e WebRádios/sites de notícias utilizado pela Include. Esperamos contribuir com a sua jornada por aprendizado.

## Dependências

Neste tipo de projeto usamos [WordPress](http://wordpress.org/) como "core", [SASS](https://sass-lang.com/) para construção do CSS, [jQuery](https://jquery.com/) para os JS, [Gulp](https://gulpjs.com/) para organizar toda essa bagunça e, por último, mas não menos importante, o [Yarn](https://classic.yarnpkg.com/) para gerenciar todos esses pacotes (mas sinta-se livre pra usar o NPM, a escolha é sua :)).

Vamos lá, depois de ter clonado o projeto, siga os passos a seguir:

- Instale o [Yarn](https://classic.yarnpkg.com/)
- Execute o comando abaixo para instalar o [Gulp](https://gulpjs.com/docs/en/getting-started/quick-start) globalmente:
  ```bash
  yarn global add gulp-cli
  ```
- Inicie os Yarn na pasta:
  ```bash
  yarn init -y
  ```
- Instale todas as dependências restantes:
  ```bash
  yarn install
  ```

Obs.: é extremamente necessário ter o [Node.js](https://nodejs.org/en/) instalado.

## Usando o Gulp

O Gulp já está configurado, então não é necessário nenhuma alteração exceto se você quiser ou precisar. Caso queria aprender mais sobre o Gulp veja sua [documentação](https://gulpjs.com/docs/en/api/concepts).

Tasks públicas:

- Dev
  Faz o build do CSS e JS com seus respectivos sourcemaps e fica procurado por alterações nas sources (os arquivos dentro da pasta src)
  ```
  gulp dev
  ```
- Build
  Faz o build do CSS e JS sem os sourcemaps e não fica buscando por alterações nas sources
  ```
  gulp build
  ```
