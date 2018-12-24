# -*- coding: utf-8 -*-

from flask import (
        Blueprint, flash, g, redirect, render_template, request, url_for
    )

from auth import login_required
from backend.db import get_db

bp = Blueprint('main', __name__)

@bp.route('/')
@login_required
def index():
    return render_template('main.html')
