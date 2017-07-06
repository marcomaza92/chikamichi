exports.list = function(req, res) {
  req.getConnection(function(err,connection) {
    var query = connection.query('SELECT * FROM users',function(err,rows) {
      if(err)
          console.log("Error Selecting : %s ",err);
      res.render('index', {
        data: {
          title: 'Index - CRUD Express-Vue',
          users: rows
        },
        vue: {
          head: {
            title: 'Index CRUD'
          }
          //components: ['users']
        }
      });
    });
  });
};
exports.add = function(req, res){
  res.render('add', {
    data: {
      title: 'Add - CRUD Express-Vue',
    },
    vue: {
      head: {
        title: 'Add New Entry'
      }
    }
  });
};
exports.add_save = function(req,res) {
    var input = JSON.parse(JSON.stringify(req.body || null));
    req.getConnection(function(err, connection) {
        var data = {
            name    : input.name,
            address : input.address,
            email   : input.email,
            phone   : input.phone
        };
        var query = connection.query("INSERT INTO users SET ? ", data, function(err, rows) {
          if (err)
              console.log("Error inserting : %s ", err);
          res.redirect('/');
        });
    });
};
exports.edit = function(req, res){
    var id = req.params.id;
    req.getConnection(function(err,connection){
        var query = connection.query('SELECT * FROM users WHERE id = ?', [id], function(err,rows) {
            if(err)
                console.log("Error Selecting : %s ", err);
            res.render('edit', {
              data: {
                title: 'Edit - CRUD Express-Vue',
                users: rows
              },
              vue: {
                head: {
                  title: 'Edit Entry'
                }
                //components: ['users']
              }
            });
         });
    });
};
exports.edit_save = function(req,res){
    var input = JSON.parse(JSON.stringify(req.body || null));
    var id = req.params.id;
    req.getConnection(function (err, connection) {
        var data = {
            name    : input.name,
            address : input.address,
            email   : input.email,
            phone   : input.phone
        };
        connection.query("UPDATE users SET ? WHERE id = ? ", [data,id], function(err, rows) {
          if (err)
              console.log("Error Updating : %s ", err);
          res.redirect('/');
        });
    });
};
exports.delete = function(req,res){
     var id = req.params.id;
     req.getConnection(function (err, connection) {
        connection.query("DELETE FROM users WHERE id = ? ", [id], function(err, rows) {
           if(err)
               console.log("Error deleting : %s ", err);
           res.redirect('/');
        });
     });
};
