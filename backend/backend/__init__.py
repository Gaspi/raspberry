import os

from flask import Flask


# create and configure the app
app = Flask(__name__, instance_relative_config=True)
app.config.from_mapping(
    SECRET_KEY='dev',
    DATABASE=os.path.join(app.instance_path, 'coloc.sqlite'),
)

# load the instance config, if it exists, when not testing
app.config.from_pyfile('config.py', silent=True)
    
# ensure the instance folder exists
try:
    os.makedirs(app.instance_path)
except OSError:
    pass


import db
db.init_app(app)

import auth
app.register_blueprint(auth.bp)

import blog
app.register_blueprint(blog.bp)
app.add_url_rule('/', endpoint='index')


if __name__ == "__main__":
    app.run(debug=True)
