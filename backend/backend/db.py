
import sqlite3

import click
from flask import current_app, g
from flask.cli import with_appcontext

from werkzeug.security import generate_password_hash



def get_db():
    if 'db' not in g:
        g.db = sqlite3.connect(
            current_app.config['DATABASE'],
            detect_types=sqlite3.PARSE_DECLTYPES
        )
        g.db.row_factory = sqlite3.Row
    return g.db

def close_db(e=None):
    db = g.pop('db', None)
    if db is not None:
        db.close()

def init_db():
    db = get_db()
    with current_app.open_resource('schema.sql') as f:
        db.executescript(f.read().decode('utf8'))

def set_pwd(user, pwd):
    db = get_db()
    db.execute(
        'INSERT INTO user (username, password) VALUES (?, ?)',
        ('coloc', generate_password_hash(pwd))
    )
    db.commit()



@click.command('init-db')
@with_appcontext
def init_db_command():
    init_db()
    click.echo('Initialized the database.')

@click.command('set-pwd')
@click.option('--usr', prompt='User'    , help='The user.')
@click.option('--pwd', prompt='Password', help='The password for the user.')
@with_appcontext
def set_pwd_command(usr, pwd):
    set_pwd(usr, pwd)
    click.echo('Password set for user %s.' % usr)

    
def init_app(app):
    app.teardown_appcontext(close_db)
    app.cli.add_command(init_db_command)
    app.cli.add_command(set_pwd_command)

