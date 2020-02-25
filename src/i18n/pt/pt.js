import { ptWelcome } from './pt-welcome'
import { ptRegister } from './pt-register'
import { ptLogin } from './pt-login'
import { ptErrors } from './pt-errors'
import { ptPageTitles } from './pt-page-titles'
import { ptGeneralForm } from './pt-general-form'

const pt = {
  'welcome': ptWelcome,
  'register': ptRegister,
  'login': ptLogin,
  'error': ptErrors,
  'page_titles': ptPageTitles,
  'general_form': ptGeneralForm
}

export { pt }

export default pt
