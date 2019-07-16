from flask import Flask, escape, request, url_for

app = Flask(__name__)

@app.route('/')
def index():
    pass

@app.route('/login')
def login():
    pass

@app.route('/user/<username>')
def profile(username):
    pass

@app.route('/compile', methods=['GET', 'POST'])
def compile():
    return '{"output":"Hello, World!\\n","errors":"\\n"}'

if __name__ == '__main__':
    with app.test_request_context():
        app.run()