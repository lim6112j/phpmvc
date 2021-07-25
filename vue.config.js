module.exports={
    pages: {
        index: {
          // entry for the page
          entry: 'src/main.js',
          // the source template
          template: 'views/template/default.php',
          // output as dist/index.html
          filename: '../views/layout/default.php',
          // when using title option,
          // template title tag needs to be <title><%= htmlWebpackPlugin.options.title %></title>
          title: 'Home Page',
          // chunks to include on this page, by default includes
          // extracted common chunks and vendor chunks.
          chunks: ['chunk-vendors', 'chunk-common', 'index']
        },
    }
}