// global state for default null
const globalState = {
    data: [
        {id: 1, name: 'Instagram', link: 'www.instagram.com'},
        {id: 2, name: 'Facebook', link: 'www.facebook.com'},
        {id: 3, name: 'github', link: 'www.github.com'}
    ]
}


const mediaReducer = (state = globalState, action) => {    
    switch(action.type){
        case "UPDATE_MEDIA" :
            console.log('state = ', state);
            console.log('action = ', action);
    
            return {
                ...state,
                data: state.data.map(media => {
                  if (media.id !== action.data.id) {
                    return media
                  } else {
                    return { 
                        ...media, 
                        name: action.data.name 
                    };
                  }
                })
            };
        default:
            return state;
    }
}

export default mediaReducer;