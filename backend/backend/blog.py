
from flask import (
        Blueprint, flash, g, redirect, render_template, request, url_for
    )
from werkzeug.exceptions import abort

from auth import login_required
from db import get_db

bp = Blueprint('blog', __name__)

@bp.route('/')
@login_required
def index():
    return render_template('blog/index.html', posts=posts)


@bp.route('/posts')
@login_required
def posts():
    db = get_db()
    posts = db.execute(
        'SELECT p.id, title, body, created, author_id, username'
        ' FROM post p JOIN user u ON p.author_id = u.id'
        ' ORDER BY created DESC'
    ).fetchall()
    return render_template('blog/posts.html', posts=posts)






