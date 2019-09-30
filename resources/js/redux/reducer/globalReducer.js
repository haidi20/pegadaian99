import ActionType from './globalActionType';

// global state for default null
const globalState = {
    media: [
        {id: Math.random(), name: 'Instagram', link: 'www.instagram.com'},
        {id: Math.random(), name: 'Facebook', link: 'www.facebook.com'},
        {id: Math.random(), name: 'github', link: 'www.github.com'}
    ]
}


const rootReducer = (state = globalState, action) => {    
    if(action.type === ActionType.ADD_MEDIA){
        return {
            ...state,
            id: state.media.id,
            name: state.media.name,
            link: state.media.link,
        }
    }
    
    return state;
}

export default rootReducer;