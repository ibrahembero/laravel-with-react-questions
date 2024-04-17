import axios from 'axios';
import React, { useEffect, useState } from 'react';
import { Navigate, useNavigate, useParams } from 'react-router-dom';
import './ShowQuestion.css'

function ShowQuestion(){

    const {id} = useParams();
    const navigate = useNavigate();
    const apiUrl = 'http://localhost/subscriber-company/project-one/public/api';
    const endPoint = '/questions/';
    const [questionTitle , setQuestionTitle] = useState('')
    let title =''
    const [questionImage , setQuestionImage] = useState('')
    let image =''
    const getQuestion = async()=>{
        await axios.get(apiUrl+endPoint+id,
            {
                headers: {
                "Accept" : "application/json",
                "Content-Type" : "application/json"
                }
            }).then(res => {
                // setQuestion(res.data.question)
                 console.log(res.data.question)
                 console.log(res.data.question.question_title)
                 title = res.data.question.question_title;
                 setQuestionTitle(title)
                 console.log(title)
                 console.log(res.data.question.image)
                 image = res.data.question.image;
                 setQuestionImage(image)
                 console.log(image)
                 
            })
            .catch(err => console.log(err));
    }
    useEffect(()=>{
       getQuestion();
    },[])
   
    return (
        <div>
                
                <div className='main question-detail'>
                    <div className='content'>
                         {/* <h1>Show Question Page</h1> */}
                         <p>{questionTitle}</p>
                         <img src={`http://localhost/subscriber-company/project-one/storage/app/public/${questionImage}`} className='img-design' alt='there is no photo'/>
                         {/* <img src={'http://127.0.0.1:8000/storage/'+questionImage} className='img-design' alt='there is no photo'/> */}
                            
                    </div>
                </div>
        </div>
        
    )
}

export default ShowQuestion;