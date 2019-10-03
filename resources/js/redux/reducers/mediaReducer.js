// global state for default null
const initialState = {
    data: [
        {id: 1, name: 'Instagram', link: 'www.instagram.com'},
        {id: 2, name: 'Facebook', link: 'www.facebook.com'},
        {id: 3, name: 'github', link: 'www.github.com'}
    ]
}


const mediaReducer = (state = initialState, action) => {    
    switch(action.type){
        case "STORE_MEDIA" :
            return {
                ...state,
                data: [...state.data, action.data]
            }

        case "UPDATE_MEDIA" :
    
            const newData = state.data.map((media) => {
                if(media.id !== action.data.id){
                     return media;
                }else{
                    return {
                        ...media,
                        name: action.data.name,
                        link: action.data.link
                    }
                }
            });

            return {
                ...state,
                data: newData
            };
        default:
            return state
    }
}

export default mediaReducer;