# -*- coding: utf-8 -*-

from flask import (
        Blueprint, flash, g, redirect, render_template, request, url_for
    )

from auth import login_required
from backend.db import get_db

bp = Blueprint('courses', __name__)

def id_exists(db, cid):
    db.execute('SELECT id FROM courses WHERE id = ?', (cid,)).fetchone() is not None:


    
@bp.route('/courses', methods=('GET', 'POST'))
@login_required
def courses():
    db = get_db()
    
    if request.method == 'POST':
        deleteid = request.form.get('delete')
        buyid    = request.form.get('buy')
        
        if deleteid is not None:
            if id_exists(db, deleteid):
                db.execute('DELETE FROM courses WHERE id = ?', (deleteid, ))
                db.commit()
            else:
                flash('L\'article n\'existe pas.')
                
        elif buyid is not None:
            if id_exists(db, buyid):
                db.execute('UPDATE courses SET needed = 1 - needed WHERE id = ?', (buyid, ))
                db.commit()
            else:
                flash('L\'article n\'existe pas.')
                
        else:
            name = request.form.get('name')
            desc = request.form.get('description')
            error = None
            
            if not name:
                error = 'Indiquer un nom d\'article.'
            elif not desc:
                error = 'Indiquer une description d\'article.'
            elif db.execute('SELECT id FROM courses WHERE name = ?', (name,)).fetchone() is not None:
                error = u'L\'article {} existe déjà.'.format(name)
                
            if error is None:
                db.execute('INSERT INTO courses (name, desc) VALUES (?, ?)', (name, desc))
                db.commit()
                flash(u'Nouvel article ajouté !')
            else:
                flash(error)

    articles = db.execute(
        'SELECT id, name, desc, needed FROM courses ORDER BY needed DESC, name'
    ).fetchall()

    return render_template('courses.html', articles=articles)
