// global state for default null
const globalState = {
    media: [
        {id: 1, name: 'Instagram', link: 'www.instagram.com'},
        {id: 2, name: 'Facebook', link: 'www.facebook.com'},
        {id: 3, name: 'github', link: 'www.github.com'}
    ]
}


const rootReducer = (state = globalState, action) => {    
    if(action.type === 'ADD_MEDIA'){
        return {
            ...state,
            id: state.media.id,
            name: state.media.name,
            link: state.media.link,
        }
    }

    if(action.type == 'EDIT_MEDIA'){
        console.log(action);
    }
    
    return state;
}

export default rootReducer;