const Roles = {
  Superadmin: 1,
  Admin: 2,
  Target: 3
}

const BasesOrigins = {
  PUBLIC: 1,
  PRIVATE: 2,
  PROTECTED: 3
}

const CampaignsStatus = {
  CREATED: 1,
  ACTIVED: 2,
  PAUSED: 3,
  DELETED: 4
}

const ExtractionsStatus = {
  SOLICITED: 1,
  APPROVED: 2,
  TRANSFERRED: 3,
  DENIED: 4
}

const QuestionsTypes = {
  SINGLE: 1,
  IMAGE: 2,
  VIDEO: 3,
  URL: 4
}

const ResponsesTypes = {
  BOOLEAN: 1,
  UNIQUE_SELECTION: 2,
  MULTIPLE_SELECTION: 3,
  SCALE_SELECTION: 4,
  DISCURSIVE: 5
}

const UsersStatus = {
  BEGINNER: 1,
  ACTIVE: 2,
  DELETED: 3,
  INACTIVE: 4,
  PENDING: 5,
  PAUSED: 6
}

export { Roles, BasesOrigins, CampaignsStatus, ExtractionsStatus, QuestionsTypes, ResponsesTypes, UsersStatus }
