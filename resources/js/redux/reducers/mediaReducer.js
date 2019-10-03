// global state for default null
const globalState = {
    data: [
        {id: 1, name: 'Instagram', link: 'www.instagram.com'},
        {id: 2, name: 'Facebook', link: 'www.facebook.com'},
        {id: 3, name: 'github', link: 'www.github.com'}
    ]
}


const mediaReducer = (state = globalState, action) => {    
    if(action.type === 'ADD_DATA'){
        return {
            ...state,
            id: state.data.id,
            name: state.data.name,
            link: state.data.link,
        }
    }

    if(action.type == 'EDIT_DATA'){
        console.log(action);
    }
    
    return state;
}

export default mediaReducer;