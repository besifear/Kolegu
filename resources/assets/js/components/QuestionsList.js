import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class QuestionsList extends Component {
    constructor(props) {
        super(props);

        this.state = {
            questions: [window.questions],
            currentUser : window.currentUser,
            token : window.token,
        }
    }

    upVoteQuestion( e, questionId ){
        console.log('upvote!');
        console.log(document.getElementById('downvote-form-'+questionId));
        document.getElementById('upvote-form-'+questionId).submit();
    }

    downVoteQuestion( questionId ){
        console.log('downvote!');
        document.getElementById('downvote-form-'+questionId).submit();
    }



    renderQuestions() {
        return this.state.questions[0].data.map(question => {
            return (
                <li id={"question-" +question.id} key={question.id} >
                    <div className = "index-list-item">
                        <div id="adaptive-container" className="hidden-xs">
                            <ul className="event-list">
                                <li className="questionListItem">
                                    <div className="social">
                                        <ul>
                                            <li className={"facebook " + (this.state.currentUser.id != 0 && question.my_up_vote != 0 ? "aqua" : "")} style={{ width : '33%' }}>

                                                <a onClick={ this.upVoteQuestion.bind(this, event, question.id) }>

                                                    <span className="glyphicon glyphicon-chevron-up"></span>
                                                    <br/>
                                                    <small>{question.question_up_votes}</small>
                                                </a>
                                            </li>
                                            <li className={"twitter " + ((this.state.currentUser.id != 0 && question.my_down_vote != 0) ? "lava" : "")} style={{ width : '33%' }}>

                                                <a onClick={this.downVoteQuestion.bind(this, question.id)}>
                                                    <span className="glyphicon glyphicon-chevron-down"></span>
                                                    <br/>
                                                    <small>{question.question_down_votes}</small>
                                                </a>
                                            </li>
                                            <li className="google-plus" style={{ width : '33%' }}>
                                                <a href={"/questions/"+question.id}>
                                                    <span className="glyphicon glyphicon-comment"></span>
                                                    <br/>
                                                    <small>{question.question_all_answers}</small>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div className="info">

                                        <a  className="title" href={"/questions/"+question.id}>{question.title}</a>

                                        <p className="desc">{question.content}</p>
                                        <ul style={{ width : 'auto', float : 'left' }}>
                                            <li><a href="/categories">{question.question_category != undefined && question.question_category.name}</a></li>
                                        </ul>
                                        <ul style={{ width : 'auto', float : 'left' }} className="pull-right">
                                            <li><p style={{ fontSize : '9pt' }} >Posted {question.diff_for_humans} by <a href={"/users/"+ (question.question_owner != undefined ? question.question_owner.id : "")}>{(question.question_owner != undefined ? question.question_owner.username : "")}</a></p></li>
                                        </ul>
                                    </div>
                                </li>
                                <form id={"upvote-form-"+ question.id} action="/questionupvote" method="POST" style={{ display : 'hidden' }}>
                                    <input id="question_id" name="question_id" type="hidden" value={question.id} />
                                    <input name="_method" value="POST" type="hidden"/>
                                    <input name="_token" value={this.state.token} type="hidden"/>
                                </form>

                                <form id={"downvote-form-"+ question.id} action="/questiondownvote" method="POST" style={{ display : 'hidden' }}>
                                    <input id="question_id" name="question_id" type="hidden" value={question.id} />
                                    <input name="_method" value="POST" type="hidden"/>
                                    <input name="_token" value={this.state.token} type="hidden"/>
                                </form>

                                <div className="pull-right">
                                    { this.state.currentUser.id != 0 && question.question_owner != undefined && this.state.currentUser.id == question.question_owner.id &&
                                    <form method="POST" action={"/questions/"+question.id} acceptCharset="UTF-8">
                                        <input name="_method" value="DELETE" type="hidden"/>
                                        <input name="_token" value={this.state.token} type="hidden"/>
                                        <input name="id" value={question.id} type="hidden"/>
                                        <input className="btn btn-danger btn-xs" value="Fshije" type="submit"/>
                                    </form>
                                    }

                                </div>
                                <br/>
                                <hr style={{ marginTop : '10px'}}/>
                            </ul>
                        </div>
                    </div>
                </li>
            );
        })
    }

    render(){
        return (
            <ul className= "index-list">
                { this.renderQuestions() }
            </ul>
        );
    }
}

export default QuestionsList;

// We only want to try to render our component on pages that have a div with an ID
// of "example"; otherwise, we will see an error in our console
if (document.getElementById('questions-list')) {
    ReactDOM.render(<QuestionsList />, document.getElementById('questions-list'));
}